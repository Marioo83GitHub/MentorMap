<?php

namespace Database\Seeders;

use App\Models\Mentor;
use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        $user = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@mm.com',
            'password' => bcrypt('123'),
        ]);
        $user->assignRole(Role::create(['name' => 'admin']));


        $user = User::factory()->create([
            'name' => 'Carlo',
            'email' => 'student@gmail.com',
            'password' => bcrypt('123'),
        ]);
        $user->assignRole(Role::create(['name' => 'student']));
        // create student
        Student::create([
            'user_id' => $user->id,
        ]);


        $user = User::factory()->create([
            'name' => 'Mentor',
            'email' => 'mentor@gmail.com',
            'password' => bcrypt('123'),
        ]);
        $user->assignRole(Role::create(['name' => 'mentor']));
        // create student
        Mentor::create([
            'user_id' => $user->id,
        ]);

        $user = User::factory()->create([
            'email' => 'mario@gmail.com',
            'password' => bcrypt('123'),
        ]);

        // --- MENTORES ---

        // 2. Mentor Mario Carbajal
        $mentor1User = User::firstOrCreate(
            ['email' => 'mariocarbajal@gmail.com'],
            [
                'name' => 'Mario Carbajal',
                'password' => Hash::make('password'),
            ]
        );
        $mentor1User->assignRole('mentor');
        Mentor::firstOrCreate(
            ['user_id' => $mentor1User->id],
            [
                'about_me' => 'Experto en desarrollo backend con Laravel-Livewire y diseño de UI/UX.',
                'average_rating' => 4.7,
                'hours_taught' => 50,
                'finalized_sessions' => 32,
                'price_per_hour' => 150.00,
                // El Botadero
                // 'latitude_aprox' => 13.1984,
                // 'longitude_aprox' => -87.4064
                // Choluteca
                'latitude_aprox' => 13.3014,
                'longitude_aprox' => -87.1826
            ],
        );


        // 3. Mentor Jose Rueda
        $mentor2User = User::firstOrCreate(
            ['email' => 'joserueda@gmail.com'],
            [
                'name' => 'Jose Rueda',
                'password' => Hash::make('password'),
            ]
        );
        $mentor2User->assignRole('mentor');
        Mentor::firstOrCreate(
            ['user_id' => $mentor2User->id],
            ['about_me' => 'Apasionado por las matemáticas y la enseñanza de conceptos complejos de forma sencilla.']
        );


        // --- ESTUDIANTES ---

        // 4. Estudiante Moises Aguilar
        $student1User = User::firstOrCreate(
            ['email' => 'moisesaguilar@gmail.com'],
            [
                'name' => 'Moises Aguilar',
                'password' => Hash::make('password'),
            ]
        );
        $student1User->assignRole('student');
        Student::firstOrCreate(['user_id' => $student1User->id]);

        // 5. Estudiante Axcel Aplicano
        $student2User = User::firstOrCreate(
            ['email' => 'axcelaplicano@gmail.com'],
            [
                'name' => 'Axcel Aplicano',
                'password' => Hash::make('password'),
            ]
        );
        $student2User->assignRole('student');
        Student::firstOrCreate(['user_id' => $student2User->id]);

    }
}
