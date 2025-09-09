<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Student; // Asegúrate de que la ruta a tu modelo Student sea correcta.
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class StudentSeeder extends Seeder
{
    /**
     * Listas de nombres y apellidos comunes en español para generar datos realistas.
     */
    private array $firstNames = [
        'Ana', 'Bruno', 'Clara', 'Diego', 'Esther', 'Felipe', 'Gloria', 'Héctor', 'Irene', 'Jorge',
        'Karla', 'Luis', 'Mariana', 'Nicolás', 'Olivia', 'Pablo', 'Quintana', 'Raquel', 'Sergio', 'Teresa',
        'Úrsula', 'Víctor', 'Wendy', 'Ximena', 'Yolanda', 'Zoe', 'Andrés', 'Bárbara', 'Camilo', 'Diana'
    ];

    private array $lastNames = [
        'García', 'Rodriguez', 'Martinez', 'Hernandez', 'Lopez', 'Gonzalez', 'Perez', 'Sanchez', 'Ramirez', 'Torres',
        'Flores', 'Rivera', 'Gomez', 'Diaz', 'Cruz', 'Reyes', 'Morales', 'Ortiz', 'Gutierrez', 'Chavez',
        'Mendoza', 'Castillo', 'Jimenez', 'Ruiz', 'Alvarez', 'Moreno', 'Romero', 'Acosta', 'Mejia', 'Salazar'
    ];

    /**
     * Run the database seeds.
     * Este seeder creará 50 estudiantes con datos realistas.
     */
    public function run(): void
    {
        // Asegurarnos de que el rol 'student' existe antes de intentar asignarlo.
        $studentRole = Role::firstOrCreate(['name' => 'student']);

        for ($i = 0; $i < 50; $i++) {
            // 1. Generar nombre y correo electrónico personalizados.
            $firstName = $this->firstNames[array_rand($this->firstNames)];
            $lastName = $this->lastNames[array_rand($this->lastNames)];

            // Limpiamos y creamos el correo electrónico.
            $emailName = Str::slug($firstName . ' ' . $lastName, '.');
            $email = $emailName . '@gmail.com';

            // Verificamos que el email sea único en la base de datos.
            // Si ya existe, le agregamos un número.
            $c = 1;
            while (User::where('email', $email)->exists()) {
                $email = $emailName . $c . '@gmail.com';
                $c++;
            }

            // 2. Crear el registro de Usuario (User)
            $user = User::create([
                'name'           => $firstName,
                'surname'        => $lastName,
                'email'          => $email,
                'password'       => Hash::make('password'), // Contraseña simple para todos.
                'account_status' => 'active',
            ]);

            // 3. Asignar el rol de 'student' al usuario recién creado.
            $user->assignRole($studentRole);

            // 4. Crear el registro de Student y asociarlo con el usuario.
            // Asegúrate de que tu modelo Student tenga los campos que uses aquí.
            Student::create([
                'user_id' => $user->id,
                'bio'     => 'Estudiante apasionado por la tecnología y el aprendizaje continuo.',
                
            ]);
        }
    }
}
