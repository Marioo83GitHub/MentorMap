<?php

namespace Database\Seeders;

use App\Models\Appointment;
use App\Models\Mentor;
use App\Models\Mentorship;
use App\Models\Student;
use App\Models\Topic;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('Creando historial de citas para Mario y Moises');

        // --- 1. OBTENER USUARIOS Y DATOS NECESARIOS ---
        $mentorMario = Mentor::whereHas('user', fn($q) => $q->where('email', 'mariocarbajal@gmail.com'))->first();
        // $studentMoises = Student::whereHas('user', fn($q) => $q->where('email', 'moisesaguilar@gmail.com'))->first();

        // $ids = Student::pluck('id')->toArray();

        $students = Student::all();

        // --- 3. OBTENER LOS TEMAS QUE MARIO ENSEÑA ---
        $marioTopics = Topic::where('mentor_id', $mentorMario->id)->get();
        if ($marioTopics->isEmpty()) {
            $this->command->error('Mario no tiene temas (topics) asignados. Asegúrate de que RealisticMentorSeeder se ejecute correctamente.');
            return;
        }

        // create appointments and mentorships with students
        foreach ($students as $student) {
            // --- 2. CREAR O ENCONTRAR LA MENTORÍA PRINCIPAL ENTRE ELLOS ---
            $mentorship = Mentorship::firstOrCreate(
                [
                    'mentor_id' => $mentorMario->id,
                    'student_id' => $student->id,
                ],
                [
                    'title' => 'Mentoría de Programación y Ciencias',
                    'active' => true,
                ]
            );

            $n = rand(1, 2);

            // --- 4. CREAR 10 CITAS EN SEPTIEMBRE DE 2025 ---
            for ($i = 0; $i < $n; $i++) {
                // CAMBIO: Se generan días a partir del día 14 para asegurar que todas las citas sean futuras.
                $day = rand(20, 30);
                $hour = rand(9, 17); // Una hora aleatoria entre 9 AM y 5 PM
                $scheduledDate = Carbon::create(2025, 9, $day, $hour, 0, 0);

                // Con el cambio anterior, el estado siempre será 'scheduled'
                $status = 'scheduled';

                Appointment::create([
                    'mentor_id' => $mentorMario->id,
                    'student_id' => $student->id,
                    'mentorship_id' => $mentorship->id,
                    'topic_id' => $marioTopics->random()->id,
                    'scheduled_at' => $scheduledDate,
                    'status' => $status,
                    'duration' => rand(1, 2), // Duración de 1 o 2 horas
                    'mentor_present' => false,
                    'student_present' => false,
                    'notes' => null,
                ]);
            }

            $this->command->info('10 citas entre Mario y ' . $student->user->name . ' creadas con éxito');
        }


        // --- 2. CREAR O ENCONTRAR LA MENTORÍA PRINCIPAL ENTRE ELLOS ---
        // $mentorship = Mentorship::firstOrCreate(
        //     [
        //         'mentor_id' => $mentorMario->id,
        //         'student_id' => $student->id,
        //     ],
        //     [
        //         'title' => 'Mentoría de Programación y Ciencias',
        //         'active' => true,
        //     ]
        // );


        // // --- 4. CREAR 10 CITAS EN SEPTIEMBRE DE 2025 ---
        // for ($i = 0; $i < 5; $i++) {
        //     // CAMBIO: Se generan días a partir del día 14 para asegurar que todas las citas sean futuras.
        //     $day = rand(20, 30);
        //     $hour = rand(9, 17); // Una hora aleatoria entre 9 AM y 5 PM
        //     $scheduledDate = Carbon::create(2025, 9, $day, $hour, 0, 0);

        //     // Con el cambio anterior, el estado siempre será 'scheduled'
        //     $status = 'scheduled';

        //     Appointment::create([
        //         'mentor_id' => $mentorMario->id,
        //         'student_id' => $student->id,
        //         'mentorship_id' => $mentorship->id,
        //         'topic_id' => $marioTopics->random()->id,
        //         'scheduled_at' => $scheduledDate,
        //         'status' => $status,
        //         'duration' => rand(1, 2), // Duración de 1 o 2 horas
        //         'mentor_present' => false,
        //         'student_present' => false,
        //         'notes' => null,
        //     ]);
        // }

        $this->command->info('10 citas entre Mario y Moises creadas con éxito');
    }
}

