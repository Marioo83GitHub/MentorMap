<?php

namespace Database\Seeders;

use App\Models\Conversation;
use App\Models\Message;
use App\Models\Mentor;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ChatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('💬 Creando conversaciones enfocadas en Mario y Moises...');

        // --- 1. OBTENER USUARIOS CLAVE Y COLECCIONES ---
        $mentorMario = Mentor::whereHas('user', fn($q) => $q->where('email', 'mariocarbajal@gmail.com'))->with('user', 'subjects')->first();
        $studentMoises = Student::whereHas('user', fn($q) => $q->where('email', 'moisesaguilar@gmail.com'))->with('user')->first();

        $allStudents = Student::with('user')->get();
        $otherMentors = Mentor::with('user', 'subjects')
            ->whereHas('user', fn($q) => $q->where('email', '!=', 'mariocarbajal@gmail.com'))
            ->inRandomOrder()
            ->take(5)
            ->get();

        // Validar que los usuarios clave existen
        if (!$mentorMario || !$studentMoises) {
            $this->command->error('No se encontró a Mario Carbajal o Moises Aguilar. Asegúrate de que sus seeders se ejecuten primero.');
            return;
        }

        // --- 2. CREAR CONVERSACIONES PARA EL MENTOR MARIO ---
        $this->command->info("Creando conversaciones para el mentor Mario Carbajal...");
        foreach ($allStudents as $student) {
            if ($mentorMario->subjects->isEmpty()) continue;

            // ¡NUEVO! Seleccionamos una materia aleatoria de las que enseña Mario
            $randomSubject = $mentorMario->subjects->random()->name;

            if ($student->id === $studentMoises->id) {
                // Saltamos a Moises, ya que tendrá conversaciones separadas
                continue;
            }

            // ¡NUEVO! Creamos una conversación más larga y dinámica
            $this->createConversation(
                $mentorMario,
                $student,
                [
                    ['sender' => $student, 'content' => "Hola Mario, soy {$student->user->name}. Vi que tienes experiencia en {$randomSubject} y me gustaría hacerte una consulta."],
                    ['sender' => $mentorMario, 'content' => "¡Hola {$student->user->name}! Claro que sí. ¿En qué te puedo ayudar?", 'delay_seconds' => rand(30, 60)],
                    ['sender' => $student, 'content' => "Estoy empezando y me siento un poco perdido con los conceptos básicos. ¿Ofreces clases introductorias?", 'delay_seconds' => rand(45, 90)],
                    ['sender' => $mentorMario, 'content' => "Por supuesto. Una buena base es fundamental. Podemos agendar una sesión para cubrir los fundamentos cuando gustes.", 'delay_seconds' => rand(30, 60)],
                ]
            );
        }

        // --- 3. CREAR 5 CONVERSACIONES PARA EL ESTUDIANTE MOISES ---
        $this->command->info("Creando 5 conversaciones para el estudiante Moises Aguilar...");
        if ($otherMentors->count() < 5) {
            $this->command->warn('No se encontraron 5 mentores diferentes para Moises, se crearán las que sean posibles.');
        }

        foreach ($otherMentors as $mentor) {
             if ($mentor->subjects->isEmpty()) continue;

            // Seleccionamos una materia aleatoria del mentor
            $mentorSubject = $mentor->subjects->random()->name;

            $this->createConversation(
                $mentor,
                $studentMoises,
                [
                    ['sender' => $studentMoises, 'content' => "Hola {$mentor->user->name}, soy Moises. Me interesa aprender sobre {$mentorSubject}. ¿Crees que me podrías ayudar?"],
                    ['sender' => $mentor, 'content' => "¡Hola Moises! Por supuesto, es un tema que me apasiona. ¿Tienes alguna duda en particular o quieres empezar desde cero?", 'delay_seconds' => rand(40, 120)],
                    ['sender' => $studentMoises, 'content' => "Me gustaría empezar desde cero para asegurar que no me pierdo nada importante.", 'delay_seconds' => rand(30, 80)],
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
        if ($mentor->user->name == "Mario" && $student->user->name == "Moises")
        {
            return;
        }

        $conversation = Conversation::firstOrCreate([
            'mentor_id' => $mentor->id,
            'student_id' => $student->id,
        ]);

        $timestamp = Carbon::now()->subHours(rand(1, 48)); // Rango de tiempo más amplio

        foreach ($messages as $message) {
            $senderId = $message['sender'] instanceof Mentor
                ? $message['sender']->user_id
                : $message['sender']->user_id;

            $delay = $message['delay_seconds'] ?? rand(20, 180); // Aumentamos el delay para más realismo
            $timestamp->addSeconds($delay);

            // Evitamos crear mensajes duplicados en la misma conversación
            Message::firstOrCreate(
                [
                    'conversation_id' => $conversation->id,
                    'sender_id' => $senderId,
                    'content' => $message['content'],
                ],
                [
                    'created_at' => $timestamp,
                    'updated_at' => $timestamp,
                ]
            );
        }
    }
}

