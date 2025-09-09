<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Mentor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class MentorSeeder extends Seeder
{
    /**
     * Coordenadas del centro de la ciudad de Choluteca, Honduras.
     * Usaremos este punto como base para generar las ubicaciones aleatorias.
     */
    private const CHOLUTECA_LAT = 13.3033;
    private const CHOLUTECA_LON = -87.1833;

    /**
     * Listas de nombres y apellidos comunes en español para generar datos realistas.
     */
    private array $firstNames = [
        'Alejandro', 'Beatriz', 'Carlos', 'Daniela', 'Eduardo', 'Fernanda', 'Gabriel', 'Hilda', 'Ivan', 'Jimena',
        'Kevin', 'Laura', 'Manuel', 'Natalia', 'Oscar', 'Patricia', 'Ricardo', 'Sofia', 'Tomás', 'Valeria',
        'Andrea', 'David', 'Elena', 'Francisco', 'Gabriela', 'Hugo', 'Isabel', 'Javier', 'Lucía', 'Miguel'
    ];

    private array $lastNames = [
        'García', 'Rodriguez', 'Martinez', 'Hernandez', 'Lopez', 'Gonzalez', 'Perez', 'Sanchez', 'Ramirez', 'Torres',
        'Flores', 'Rivera', 'Gomez', 'Diaz', 'Cruz', 'Reyes', 'Morales', 'Ortiz', 'Gutierrez', 'Chavez',
        'Mendoza', 'Castillo', 'Jimenez', 'Ruiz', 'Alvarez', 'Moreno', 'Romero', 'Acosta', 'Mejia', 'Salazar'
    ];


    /**
     * Run the database seeds.
     * Este seeder creará 30 mentores con datos realistas y ubicaciones aleatorias
     * en un radio de 3km alrededor del centro de Choluteca.
     */
    public function run(): void
    {
        // Asegurarnos de que el rol 'mentor' existe antes de intentar asignarlo.
        $mentorRole = Role::firstOrCreate(['name' => 'mentor']);

        for ($i = 0; $i < 30; $i++) {
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
                'name' => $firstName,
                'surname' => $lastName,
                'email' => $email,
                'password' => Hash::make('password'), // Contraseña simple para todos.
                'account_status' => 'active',
            ]);

            // 3. Asignar el rol de 'mentor' al usuario recién creado.
            $user->assignRole($mentorRole);

            // 4. Generar las coordenadas aleatorias.
            $coordinates = $this->generateRandomCoordinates(self::CHOLUTECA_LAT, self::CHOLUTECA_LON, 3); // Radio de 3 km

            // 5. Crear el registro de Mentor y asociarlo con el usuario.
            Mentor::create([
                'user_id' => $user->id,
                'about_me' => 'Mentor experto en diversas áreas con más de 5 años de experiencia, comprometido con el desarrollo profesional y personal de mis aprendices.',
                'latitude_aprox' => $coordinates['lat'],
                'longitude_aprox' => $coordinates['lon'],
            ]);
        }
    }

    /**
     * Genera un punto de coordenadas aleatorio dentro de un radio específico desde un punto central.
     *
     * @param float $baseLat Latitud del punto central.
     * @param float $baseLon Longitud del punto central.
     * @param float $radiusInKm Radio en kilómetros.
     * @return array ['lat' => float, 'lon' => float]
     */
    private function generateRandomCoordinates($baseLat, $baseLon, $radiusInKm): array
    {
        $radiusInDeg = $radiusInKm / 111.32; // Conversión aproximada de km a grados.

        $u = mt_rand() / mt_getrandmax();
        $v = mt_rand() / mt_getrandmax();

        $w = $radiusInDeg * sqrt($u);
        $t = 2 * M_PI * $v;

        $x = $w * cos($t);
        // Corrige la distorsión de la longitud a medida que nos alejamos del ecuador.
        $y = $w * sin($t) / cos(deg2rad($baseLat));

        return [
            'lat' => $baseLat + $x,
            'lon' => $baseLon + $y,
        ];
    }
}
