<?php

namespace Database\Seeders;

use App\Models\Conversation;
use App\Models\Discipline;
use App\Models\Mentor;
use App\Models\Message;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ChatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Este seeder crea un ecosistema completo de datos de demostración.
     */
    public function run(): void
    {
        // --- 1. CREACIÓN DE DISCIPLINAS Y MATERIAS ---
        $this->command->info('Creando Disciplinas y Materias...');
        
        $isw = Discipline::create(['name' => 'Ingeniería de Software']);
        $progWeb = Subject::create(['name' => 'Programación Web', 'discipline_id' => $isw->id]);
        $movil = Subject::create(['name' => 'Desarrollo Móvil', 'discipline_id' => $isw->id]);
        
        $math = Discipline::create(['name' => 'Matemáticas']);
        $calculo = Subject::create(['name' => 'Cálculo', 'discipline_id' => $math->id]);
        $algebra = Subject::create(['name' => 'Álgebra', 'discipline_id' => $math->id]);

        $idiomas = Discipline::create(['name' => 'Idiomas']);
        $ingles = Subject::create(['name' => 'Inglés', 'discipline_id' => $idiomas->id]);

        // --- 2. CREACIÓN DE MENTORES ---
        $this->command->info('Creando Mentores...');

        $mentor1User = User::create(['name' => 'Mario Carvajal', 'email' => 'mariocarvajal@gmail.com', 'password' => Hash::make('password')]);
        $mentor1User->assignRole('mentor');
        $mentor1 = Mentor::create(['user_id' => $mentor1User->id, 'about_me' => 'Experto en desarrollo backend con Laravel y ecosistema TALL stack.']);

        $mentor2User = User::create(['name' => 'Jose Rueda', 'email' => 'joserueda@gmail.com', 'password' => Hash::make('password')]);
        $mentor2User->assignRole('mentor');
        $mentor2 = Mentor::create(['user_id' => $mentor2User->id, 'about_me' => 'Apasionado por las matemáticas y la enseñanza de conceptos complejos de forma sencilla.']);

        // --- 3. ASIGNAR ASIGNATURAS A MENTORES (EL PUENTE QUE FALTABA) ---
        $this->command->info('Asignando Subjects a los Mentores...');
        
        // Mario Carvajal enseñará Programación Web y Desarrollo Móvil
        $mentor1->subjects()->attach([$progWeb->id, $movil->id]);

        // Jose Rueda enseñará Cálculo, Álgebra e Inglés
        $mentor2->subjects()->attach([$calculo->id, $algebra->id, $ingles->id]);


        // --- 4. CREACIÓN DE TEMAS PARA LOS MENTORES (LA CLAVE PARA TU MODAL) ---
        $this->command->info('Asignando Temas a los Mentores...');

        // Temas para Mario Carvajal (Mentor 1)
        Topic::create(['topic' => 'Desarrollo con Laravel y Livewire', 'mentor_id' => $mentor1->id, 'subject_id' => $progWeb->id]);
        Topic::create(['topic' => 'Bases de Datos con Eloquent', 'mentor_id' => $mentor1->id, 'subject_id' => $progWeb->id]);
        Topic::create(['topic' => 'Desarrollo de APIs RESTful', 'mentor_id' => $mentor1->id, 'subject_id' => $progWeb->id]);

        // Temas para Jose Rueda (Mentor 2)
        Topic::create(['topic' => 'Cálculo Diferencial e Integral', 'mentor_id' => $mentor2->id, 'subject_id' => $calculo->id]);
        Topic::create(['topic' => 'Álgebra Lineal y Matrices', 'mentor_id' => $mentor2->id, 'subject_id' => $algebra->id]);
        Topic::create(['topic' => 'Preparación para examen de Inglés B2', 'mentor_id' => $mentor2->id, 'subject_id' => $ingles->id]);


        // --- 5. CREACIÓN DE ESTUDIANTES ---
        $this->command->info('Creando Estudiantes...');

        $student1User = User::create(['name' => 'Moises Aguilar', 'email' => 'moisesaguilar@gmail.com', 'password' => Hash::make('password')]);
        $student1User->assignRole('student');
        $student1 = Student::create(['user_id' => $student1User->id]);

        $student2User = User::create(['name' => 'Axcel Aplicano', 'email' => 'axcelaplicano@gmail.com', 'password' => Hash::make('password')]);
        $student2User->assignRole('student');
        $student2 = Student::create(['user_id' => $student2User->id]);


        // --- 6. CREACIÓN DE CONVERSACIONES Y MENSAJES ---
        $this->command->info('Creando Conversaciones y Mensajes...');

        // Conversación 1: Mentor 1 con Estudiante 1
        $convo1 = Conversation::create(['mentor_id' => $mentor1->id, 'student_id' => $student1->id]);
        Message::insert([
            ['conversation_id' => $convo1->id, 'sender_id' => $student1User->id, 'content' => 'Hola Mentor, ¿tienes tiempo para una duda con Livewire?', 'created_at' => now(), 'updated_at' => now()],
            ['conversation_id' => $convo1->id, 'sender_id' => $mentor1User->id, 'content' => '¡Claro! Dime en qué te puedo ayudar.', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Conversación 2: Mentor 2 con Estudiante 2
        $convo2 = Conversation::create(['mentor_id' => $mentor2->id, 'student_id' => $student2->id]);
        Message::insert([
            ['conversation_id' => $convo2->id, 'sender_id' => $student2User->id, 'content' => 'Buenas tardes, necesito ayuda con un tema de cálculo diferencial. ¿Está disponible?', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Conversación 3: Mentor 2 con Estudiante 1
        $convo3 = Conversation::create(['mentor_id' => $mentor2->id, 'student_id' => $student1->id]);
        Message::insert([
            ['conversation_id' => $convo3->id, 'sender_id' => $mentor2User->id, 'content' => 'Hola Moises, vi que estabas buscando ayuda con Álgebra. ¿Podemos hablar?', 'created_at' => now(), 'updated_at' => now()],
            ['conversation_id' => $convo3->id, 'sender_id' => $student1User->id, 'content' => '¡Hola! Sí, perfecto, muchas gracias.', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Conversación 4: Mentor 1 con Estudiante 2
        $convo4 = Conversation::create(['mentor_id' => $mentor1->id, 'student_id' => $student2->id]);
        Message::insert([
            ['conversation_id' => $convo4->id, 'sender_id' => $student2User->id, 'content' => 'Hola Mario, ¿podrías explicarme cómo funcionan las migraciones en Laravel?', 'created_at' => now(), 'updated_at' => now()],
            ['conversation_id' => $convo4->id, 'sender_id' => $mentor1User->id, 'content' => 'Por supuesto, Axcel. Es un concepto clave. ¿Quieres agendar una sesión para verlo a fondo?', 'created_at' => now(), 'updated_at' => now()],
        ]);
        
        $this->command->info('¡Seeder de demostración completado con éxito!');
    }
}

