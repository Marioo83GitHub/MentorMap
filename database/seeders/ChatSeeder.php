<?php

namespace Database\Seeders;

use App\Models\Conversation;
use App\Models\Message;
use App\Models\Mentor;
use App\Models\Student;
use App\Models\Subject; // Importamos Subject
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ChatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('💬 Creando conversaciones y mensajes realistas...');

        // --- 1. OBTENER USUARIOS ESPECÍFICOS Y ALEATORIOS ---
        
        // Obtenemos a los mentores principales por su email
        $mentorMario = Mentor::whereHas('user', fn($q) => $q->where('email', 'mariocarbajal@gmail.com'))->with('user')->first();
        $mentorJose = Mentor::whereHas('user', fn($q) => $q->where('email', 'joserueda@gmail.com'))->with('user')->first();

        // Obtenemos a los estudiantes principales por su email
        $studentMoises = Student::whereHas('user', fn($q) => $q->where('email', 'moisesaguilar@gmail.com'))->with('user')->first();
        $studentAxcel = Student::whereHas('user', fn($q) => $q->where('email', 'axcelaplicano@gmail.com'))->with('user')->first();
        $studentValeria = Student::whereHas('user', fn($q) => $q->where('email', 'valeria.cruz@gmail.com'))->with('user')->first();
        
        // Tomamos algunos mentores y estudiantes al azar para más variedad
        $randomMentors = Mentor::with('user', 'subjects')->whereNotIn('id', [$mentorMario?->id, $mentorJose?->id])->inRandomOrder()->take(5)->get();

        // --- 2. ASIGNAR MATERIAS A MENTORES PRINCIPALES (PARA ASEGURAR CONSISTENCIA) ---
        if ($mentorMario) {
            $progSubjects = Subject::whereIn('name', ['Programación Web', 'Bases de Datos'])->pluck('id');
            $mentorMario->subjects()->syncWithoutDetaching($progSubjects);
        }
        if ($mentorJose) {
            $mathSubjects = Subject::whereIn('name', ['Cálculo', 'Álgebra'])->pluck('id');
            $mentorJose->subjects()->syncWithoutDetaching($mathSubjects);
        }


        // --- 3. CREAR CONVERSACIONES GARANTIZADAS PARA MARIO Y JOSÉ ---

        if ($mentorMario && $studentMoises) {
            $this->createConversation(
                $mentorMario,
                $studentMoises,
                [
                    ['sender' => $studentMoises, 'content' => 'Hola Mario, soy Moises. Vi tu perfil y tu experiencia en Laravel es justo lo que necesito para mi tesis. ¿Podríamos hablar?'],
                    ['sender' => $mentorMario, 'content' => '¡Hola Moises! Por supuesto, encantado de ayudar. Cuéntame un poco más sobre tu proyecto.', 'delay_seconds' => 45],
                ]
            );
        }

        if ($mentorJose && $studentAxcel) {
            $this->createConversation(
                $mentorJose,
                $studentAxcel,
                [
                    ['sender' => $studentAxcel, 'content' => 'Buenas tardes José. Estoy preparándome para el examen de admisión y el cálculo se me complica. ¿Me podrías ayudar?'],
                    ['sender' => $mentorJose, 'content' => 'Hola Axcel. Claro que sí, el cálculo es mi especialidad. Podemos empezar por los fundamentos de derivadas.', 'delay_seconds' => 30],
                    ['sender' => $studentAxcel, 'content' => 'Perfecto, ¡muchas gracias!', 'delay_seconds' => 20],
                ]
            );
        }
        
        if ($mentorMario && $studentValeria) {
            $this->createConversation(
                $mentorMario,
                $studentValeria,
                [
                    ['sender' => $mentorMario, 'content' => 'Hola Valeria, soy Mario. Vi que te interesa el diseño y quieres aprender a programar. ¡Es una gran combinación! Si necesitas ayuda con HTML o CSS, no dudes en consultarme.'],
                    ['sender' => $studentValeria, 'content' => '¡Hola Mario! Qué amable, muchas gracias. Justo estoy atascada con el diseño responsivo.', 'delay_seconds' => 90],
                ]
            );
        }
        
        if ($mentorJose && $studentMoises) {
            $this->createConversation(
                $mentorJose,
                $studentMoises,
                [
                    ['sender' => $studentMoises, 'content' => 'Hola José, una consulta, ¿también ayudas con temas de Álgebra Lineal?'],
                    ['sender' => $mentorJose, 'content' => '¡Hola Moises! Sí, claro. Matrices, determinantes, espacios vectoriales. ¿Qué necesitas repasar?', 'delay_seconds' => 40],
                ]
            );
        }

        // --- 4. CREAR ALGUNAS CONVERSACIONES ALEATORIAS ADICIONALES ---
        $randomStudent = Student::with('user')->inRandomOrder()->first();
        if ($randomMentors->isNotEmpty() && $randomStudent) {
            $this->createConversation(
                $randomMentors->first(),
                $randomStudent,
                [
                    ['sender' => $randomStudent, 'content' => 'Hola, ¿está disponible para una tutoría esta semana?'],
                    ['sender' => $randomMentors->first(), 'content' => 'Hola, sí. ¿Qué día y hora te viene bien?', 'delay_seconds' => 120],
                ]
            );
        }

        $this->command->info('✅ Conversaciones creadas con éxito.');
    }

    /**
     * Helper para crear una conversación y sus mensajes.
     */
    private function createConversation(Mentor $mentor, Student $student, array $messages): void
    {
        // ... (Este método no necesita cambios, está perfecto)
        $conversation = Conversation::firstOrCreate([
            'mentor_id' => $mentor->id,
            'student_id' => $student->id,
        ]);

        $timestamp = Carbon::now()->subMinutes(rand(5, 60));

        foreach ($messages as $message) {
            $senderId = $message['sender'] instanceof Mentor ? $message['sender']->user_id : $message['sender']->user_id;
            $delay = $message['delay_seconds'] ?? rand(10, 120);
            $timestamp->addSeconds($delay);

            Message::create([
                'conversation_id' => $conversation->id,
                'sender_id' => $senderId,
                'content' => $message['content'],
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ]);
        }
    }
}
