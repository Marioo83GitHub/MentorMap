<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Student;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class StudentSeeder extends Seeder
{
    /**
     * Datos de los estudiantes de demostración.
     * Ya no se incluye la 'bio'.
     */
    private array $studentsData = [
        [
            'name' => 'Moises',
            'surname' => 'Aguilar',
            'email' => 'moisesaguilar@gmail.com',
        ],
        [
            'name' => 'Axcel',
            'surname' => 'Aplicano',
            'email' => 'axcelaplicano@gmail.com',
        ],
        [
            'name' => 'Valeria',
            'surname' => 'Cruz',
            'email' => 'valeria.cruz@gmail.com',
        ],
        [
            'name' => 'Fernando',
            'surname' => 'Díaz',
            'email' => 'fernando.diaz@gmail.com',
        ],
        [
            'name' => 'Sofía',
            'surname' => 'Ramírez',
            'email' => 'sofia.ramirez@gmail.com',
        ],
        [
            'name' => 'Carlo',
            'surname' => 'Contreras',
            'email' => 'student@gmail.com',
        ]
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('🧑‍🎓 Creando perfiles de estudiantes...');
        
        $studentRole = Role::firstOrCreate(['name' => 'student']);

        foreach ($this->studentsData as $studentData) {
            // 1. Crear o encontrar el usuario.
            $user = User::firstOrCreate(
                ['email' => $studentData['email']],
                [
                    'name' => $studentData['name'],
                    'surname' => $studentData['surname'],
                    'password' => Hash::make('password123'),
                    'account_status' => 'active',
                ]
            );

            // 2. Asignar rol de estudiante.
            $user->assignRole($studentRole);

            // 3. Crear el perfil de estudiante (sin bio).
            Student::firstOrCreate(
                ['user_id' => $user->id]
            );
        }
    }
}
