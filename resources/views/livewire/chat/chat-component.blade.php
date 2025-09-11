<div class="flex h-screen antialiased text-gray-800 relative z-10" wire:poll.1s="refreshMessages">
    <div class="flex flex-row h-full w-full overflow-x-hidden">

        <!-- Columna Izquierda: Lista de Conversaciones -->
        <div class="flex flex-col py-8 pl-6 pr-2 w-64 bg-white flex-shrink-0">
            <div class="mb-4">
                @if ($userRole === 'mentor')
                    <a href="{{ route('mentors.dashboard') }}" class="text-sm text-indigo-600 hover:underline">
                        &larr; Volver al Inicio
                    </a>
                @else
                    <a href="{{ route('students.dashboard') }}" class="text-sm text-indigo-600 hover:underline">
                        &larr; Volver al Inicio
                    </a>
                @endif
            </div>
            <div class="flex flex-row items-center justify-center h-12 w-full">
                <div class="font-bold text-2xl">Chats</div>
            </div>

            <div class="flex flex-col mt-8">
                <div class="flex flex-col space-y-1 -mx-2 h-full overflow-y-auto">
                    @forelse ($conversations as $conversation)
                        <button wire:click="selectConversation({{ $conversation->id }})"
                                class="flex flex-row items-center hover:bg-gray-100 rounded-xl p-2 {{ $selectedConversation && $selectedConversation->id == $conversation->id ? 'bg-gray-200' : '' }}">
                            <div class="flex items-center justify-center h-8 w-8 bg-indigo-200 rounded-full">
                                {{ substr($conversation->getOtherParticipant()->name, 0, 1) }}
                            </div>
                            <div class="ml-2 text-sm font-semibold">
                                {{ $conversation->getOtherParticipant()->name }}
                            </div>
                        </button>
                    @empty
                        <div class="p-2 text-sm text-gray-500">No tienes conversaciones.</div>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Columna Derecha: Mensajes y Formulario de Envío -->
        <div class="flex flex-col flex-auto h-full p-6">
            <div class="flex flex-col flex-auto flex-shrink-0 rounded-2xl bg-gray-100 h-full p-4">
                
                @if ($selectedConversation)
                    <!-- =================== INICIO: CABECERA DEL CHAT =================== -->
                    <div class="flex items-center justify-between border-b-2 border-gray-200 pb-4 mb-4">
                        <div class="flex items-center">
                            <div class="flex items-center justify-center h-10 w-10 rounded-full bg-indigo-500 flex-shrink-0 text-white">
                                {{ substr($selectedConversation->getOtherParticipant()->name, 0, 1) }}
                            </div>
                            <div class="ml-3">
                                <p class="text-lg font-semibold">{{ $selectedConversation->getOtherParticipant()->name }}</p>
                            </div>
                        </div>

                        <!-- =================== BOTÓN PARA AGENDAR (SOLO PARA ESTUDIANTES) =================== -->
                        @if ($userRole === 'student' && $selectedConversation->getOtherParticipant()->mentor)
                        <div class="relative">
                            <!-- ========= ESTA ES LA LÍNEA CORREGIDA: Usamos wire:click ========= -->
                            <button wire:click="triggerScheduleModal({{ $selectedConversation->getOtherParticipant()->mentor->id }})" class="p-2 rounded-full hover:bg-gray-200 focus:outline-none" title="Agendar Sesión">
                                <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path>
                                </svg>
                            </button>
                        </div>
                        @endif
                        <!-- =================== FIN DEL BOTÓN PARA AGENDAR =================== -->

                    </div>
                    <!-- ===================== FIN: CABECERA DEL CHAT ==================== --> 

                    <div class="flex flex-col h-full overflow-x-auto mb-4">
                        <div class="flex flex-col h-full">
                            @forelse ($messages as $message)
                                <div class="grid grid-cols-12 gap-y-2">
                                    @if ($message->sender_id != auth()->id())
                                        <div class="col-start-1 col-end-8 p-3 rounded-lg">
                                            <div class="flex flex-row items-center">
                                                <div class="flex items-center justify-center h-10 w-10 rounded-full bg-indigo-500 flex-shrink-0 text-white">
                                                    {{ substr($message->sender->name, 0, 1) }}
                                                </div>
                                                <div class="relative ml-3 text-sm bg-white py-2 px-4 shadow rounded-xl">
                                                    <div>{{ $message->content }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="col-start-6 col-end-13 p-3 rounded-lg">
                                            <div class="flex items-center justify-start flex-row-reverse">
                                                <div class="flex items-center justify-center h-10 w-10 rounded-full bg-blue-500 flex-shrink-0 text-white">
                                                    Tú
                                                </div>
                                                <div class="relative mr-3 text-sm bg-indigo-100 py-2 px-4 shadow rounded-xl">
                                                    <div>{{ $message->content }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            @empty
                                <div class="flex items-center justify-center h-full text-gray-500">
                                    Aún no hay mensajes. ¡Envía el primero!
                                </div>
                            @endforelse
                        </div>
                    </div>

                    <div class="flex flex-row items-center h-16 rounded-xl bg-white w-full px-4">
                        <div class="flex-grow ml-4">
                            <div class="relative w-full">
                                <form wire:submit.prevent="sendMessage">
                                    <input type="text"
                                           wire:model.defer="newMessage"
                                           class="flex w-full border rounded-xl focus:outline-none focus:border-indigo-300 pl-4 h-10"
                                           placeholder="Escribe tu mensaje..."/>
                                </form>
                            </div>
                        </div>
                        <div class="ml-4">
                            <button wire:click="sendMessage"
                                    class="flex items-center justify-center bg-indigo-500 hover:bg-indigo-600 rounded-xl text-white px-4 py-1 flex-shrink-0">
                                <span>Enviar</span>
                                <span class="ml-2">
                                    <svg class="w-4 h-4 transform rotate-45 -mt-px" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                                    </svg>
                                </span>
                            </button>
                        </div>
                    </div>
                @else
                    <div class="flex items-center justify-center h-full">
                        <div class="text-center text-gray-500">
                            <p class="text-xl">¡Bienvenido al chat!</p>
                            <p>Selecciona una conversación de la izquierda para comenzar.</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- =================== COMPONENTE PARA EL MODAL DE AGENDAR =================== -->
    @livewire('students.schedule-appointment')
    
</div>

