<?php

namespace Database\Seeders;

use App\Models\Conversation;
use App\Models\Mentor;
use App\Models\Message;
use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ChatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Este seeder crea:
     * - 2 Mentores con sus usuarios.
     * - 2 Estudiantes con sus usuarios.
     * - Conversaciones entre ellos.
     * - Mensajes de ejemplo en esas conversaciones.
     */
    public function run(): void
    {
        // --- CREACIÓN DE MENTORES ---
        $mentor1User = User::create([
            'name' => 'Mario Carvajal', // CAMBIADO: 'names' y 'surnames' se combinan en 'name'
            'email' => 'mariocarvajal@gmail.com',
            'password' => Hash::make('password'),
        ]);
        $mentor1User->assignRole('mentor');
        $mentor1 = Mentor::create(['user_id' => $mentor1User->id]);

        $mentor2User = User::create([
            'name' => 'Jose Rueda', // CAMBIADO: 'names' y 'surnames' se combinan en 'name'
            'email' => 'joserueda@gmail.com',
            'password' => Hash::make('password'),
        ]);
        $mentor2User->assignRole('mentor');
        $mentor2 = Mentor::create(['user_id' => $mentor2User->id]);


        // --- CREACIÓN DE ESTUDIANTES ---
        $student1User = User::create([
            'name' => 'Moises Aguilar', 
            'email' => 'moisesaguilar@gmail.com',
            'password' => Hash::make('password'),
        ]);
        $student1User->assignRole('student');
        $student1 = Student::create(['user_id' => $student1User->id]);

        $student2User = User::create([
            'name' => 'Axcel Aplicano', 
            'email' => 'axcelaplicano@gmail.com',
            'password' => Hash::make('password'),
        ]);
        $student2User->assignRole('student');
        $student2 = Student::create(['user_id' => $student2User->id]);


        // --- CREACIÓN DE CONVERSACIONES Y MENSAJES ---

        // Conversación 1: Mentor 1 con Estudiante 1
        $convo1 = Conversation::create([
            'mentor_id' => $mentor1->id,
            'student_id' => $student1->id,
        ]);
        Message::create([
            'conversation_id' => $convo1->id,
            'sender_id' => $student1User->id,
            'content' => 'Hola Mentor, ¿tienes tiempo para una duda?',
        ]);
        Message::create([
            'conversation_id' => $convo1->id,
            'sender_id' => $mentor1User->id,
            'content' => '¡Claro! Dime en qué te puedo ayudar.',
        ]);

        // Conversación 2: Mentor 1 con Estudiante 2
        $convo2 = Conversation::create([
            'mentor_id' => $mentor1->id,
            'student_id' => $student2->id,
        ]);
         Message::create([
            'conversation_id' => $convo2->id,
            'sender_id' => $student2User->id,
            'content' => 'Buenas tardes, necesito ayuda con un tema de cálculo.',
        ]);

        // Conversación 3: Mentor 2 con Estudiante 1
        $convo3 = Conversation::create([
            'mentor_id' => $mentor2->id,
            'student_id' => $student1->id,
        ]);
        Message::create([
            'conversation_id' => $convo3->id,
            'sender_id' => $mentor2User->id,
            'content' => 'Hola, vi que estabas buscando ayuda. ¿Podemos hablar?',
        ]);
    }
}

