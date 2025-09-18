<?php

namespace App\Livewire\Chat;

use App\Models\Conversation;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ChatComponent extends Component {
    // --- PROPIEDADES PÚBLICAS ---
    // Estas propiedades están disponibles en la vista Blade.

    public $conversations; // Colección de todas las conversaciones del usuario.
    public $selectedConversation; // La conversación que está actualmente seleccionada/abierta.
    public $messages; // Los mensajes de la conversación seleccionada.
    public $newMessage; // El contenido del nuevo mensaje, vinculado al input con wire:model.
    public $userRole; // Rol del usuario actual ('mentor' o 'student').
    public $searchTerm = ''; // Término de búsqueda para filtrar conversaciones.

    /**
     * El método mount() es como el constructor de Livewire.
     * Se ejecuta UNA VEZ cuando el componente se carga por primera vez.
     * Aquí inicializamos las propiedades.
     * @param int|null $conversationId - El ID de la conversación que se quiere abrir al cargar (opcional).
     */
    public function mount($conversationId = null) {
        // 1. Determinar el rol del usuario autenticado.
        $user = Auth::user();
        $this->userRole = $user->hasRole('mentor') ? 'mentor' : 'student';

        // 2. Cargar todas las conversaciones del usuario.
        $this->loadConversations($user);

        // 3. Si se pasó un ID de conversación en la URL, se selecciona.
        if ($conversationId) {
            // Buscamos la conversación y nos aseguramos de que el usuario actual participe en ella.
            $conversation = Conversation::where('id', $conversationId)
                ->where(function ($query) {
                    $user = Auth::user();
                    if ($this->userRole === 'mentor') {
                        $query->where('mentor_id', $user->mentor->id);
                    } else {
                        $query->where('student_id', $user->student->id);
                    }
                })->first();

            if ($conversation) {
                $this->selectConversation($conversation->id);
            }
        }
    }

    /**
     * Carga las conversaciones del usuario desde la base de datos.
     * Se usa with() para cargar las relaciones (mentor, student, user) y evitar el problema N+1.
     * Las conversaciones se ordenan por el último mensaje enviado.
     */
    public function loadConversations($user) {
        $query = Conversation::query();

        // Carga ansiosa para optimizar las consultas.
        // Esto trae los datos de los participantes y el último mensaje de una vez.
        $query->with(['mentor.user', 'student.user', 'lastMessage']);

        if ($this->userRole === 'mentor') {
            $query->where('mentor_id', $user->mentor->id);
        } else {
            $query->where('student_id', $user->student->id);
        }

        // Agregar subconsulta para obtener el último mensaje de cada conversación
        $query->addSelect([
            'last_message_time' => Message::select('created_at')
                ->whereColumn('conversation_id', 'conversations.id')
                ->orderBy('created_at', 'desc')
                ->limit(1)
        ]);

        // Ordenar por el último mensaje (más reciente primero)
        // Si no hay mensajes, Las muestra al final

        $query->orderByDesc('last_message_time');

        $this->conversations = $query->get();
    }

    /**
     * Se ejecuta cuando el usuario hace clic en una conversación de la lista.
     * Carga la conversación seleccionada y sus mensajes.
     * @param int $conversationId - El ID de la conversación a seleccionar.
     */
    public function selectConversation($conversationId) {
        $this->selectedConversation = Conversation::with(['mentor.user', 'student.user'])->find($conversationId);
        $this->messages = Message::where('conversation_id', $this->selectedConversation->id)
            ->with('sender') // Carga la relación con el remitente (User)
            ->orderBy('created_at', 'asc') // Ordena los mensajes del más antiguo al más nuevo
            ->get();
    }

    /**
     * Vuelve a la lista de conversaciones (especialmente útil en móviles).
     */
    public function backToConversations() {
        $this->selectedConversation = null;
        $this->messages = [];
        $this->newMessage = '';
    }

    /**
     * Envía un nuevo mensaje en la conversación seleccionada.
     * Se ejecuta cuando se envía el formulario en la vista.
     */
    public function sendMessage() {
        // 1. Validar que el mensaje no esté vacío.
        if (empty($this->newMessage)) {
            return;
        }

        // 2. Validar que haya una conversación seleccionada.
        if (!$this->selectedConversation) {
            return;
        }

        // 3. Crear el mensaje en la base de datos.
        Message::create([
            'conversation_id' => $this->selectedConversation->id,
            'sender_id' => Auth::id(),
            'content' => $this->newMessage,
        ]);

        // 4. Limpiar el campo del input en la vista.
        $this->newMessage = '';

        // 5. Recargar los mensajes para mostrar el nuevo mensaje instantáneamente.
        $this->messages = Message::where('conversation_id', $this->selectedConversation->id)
            ->with('sender')
            ->orderBy('created_at', 'asc')
            ->get();

        // 6. Recargar las conversaciones para actualizar el orden (última actividad primero)
        $this->loadConversations(Auth::user());
    }

    //Mensaje en tiempo real
    public function refreshMessages() {
        if ($this->selectedConversation) {
            $this->messages = Message::where('conversation_id', $this->selectedConversation->id)
                ->with('sender')
                ->orderBy('created_at', 'asc')
                ->get();

            // También recargar las conversaciones para mantener el orden actualizado
            $this->loadConversations(Auth::user());
        }
    }

    //Agendas Modal
    public function triggerScheduleModal($mentorId) {
        $this->dispatch('openScheduleModal', $mentorId);
    }

    /**
     * Getter para obtener las conversaciones filtradas por el término de búsqueda.
     * Se usa como una propiedad computada en la vista.
     */
    public function getFilteredConversationsProperty() {
        if (empty($this->searchTerm)) {
            return $this->conversations;
        }

        return $this->conversations->filter(function ($conversation) {
            $otherParticipant = $conversation->getOtherParticipant();
            $fullName = $otherParticipant->name . ' ' . $otherParticipant->surname;
            return stripos($fullName, $this->searchTerm) !== false;
        });
    }

    /**
     * El método render() es el encargado de mostrar la vista.
     */
    public function render() {
        return view('livewire.chat.chat-component');
    }
}
