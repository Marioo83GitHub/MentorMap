<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Mentor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Faker\Factory as Faker;

class MentorSeeder extends Seeder
{
    /**
     * Coordenadas del centro de la ciudad de Choluteca, Honduras.
     * Usaremos este punto como base para generar las ubicaciones aleatorias.
     */
    private const CHOLUTECA_LAT = 13.3033;
    private const CHOLUTECA_LON = -87.1833;

    /**
     * Run the database seeds.
     * Este seeder creará 30 mentores con ubicaciones aleatorias
     * en un radio de 3km alrededor del centro de Choluteca.
     */
    public function run(): void
    {
        // Usamos Faker para generar nombres y correos realistas.
        $faker = Faker::create('es_ES'); // Usamos el localizador español para nombres más latinos.

        // Asegurarnos de que el rol 'mentor' existe antes de intentar asignarlo.
        $mentorRole = Role::firstOrCreate(['name' => 'mentor']);

        for ($i = 0; $i < 30; $i++) {
            // 1. Crear el registro de Usuario (User)
            $user = User::create([
                'name' => $faker->firstName,
                'surname' => $faker->lastName,
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('password'), // Contraseña simple para todos para facilitar las pruebas.
                'account_status' => 'active',
            ]);

            // 2. Asignar el rol de 'mentor' al usuario recién creado.
            $user->assignRole($mentorRole);

            // 3. Generar las coordenadas aleatorias.
            $coordinates = $this->generateRandomCoordinates(self::CHOLUTECA_LAT, self::CHOLUTECA_LON, 3); // Radio de 3 km

            // 4. Crear el registro de Mentor y asociarlo con el usuario.
            Mentor::create([
                'user_id' => $user->id,
                'about_me' => 'Mentor experto en diversas áreas con más de 5 años de experiencia.',
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
        $radiusInDeg = $radiusInKm / 111.32; // Conversión aproximada de km a grados de latitud.

        $u = mt_rand() / mt_getrandmax();
        $v = mt_rand() / mt_getrandmax();

        $w = $radiusInDeg * sqrt($u);
        $t = 2 * M_PI * $v;

        $x = $w * cos($t);
        // La división por cos(deg2rad($baseLat)) corrige la distorsión de la longitud a medida que nos alejamos del ecuador.
        $y = $w * sin($t) / cos(deg2rad($baseLat));

        return [
            'lat' => $baseLat + $x,
            'lon' => $baseLon + $y,
        ];
    }
}
