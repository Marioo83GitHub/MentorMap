<?php

namespace Database\Seeders;

use App\Models\Discipline;
use App\Models\User;
use App\Models\Mentor;
use App\Models\Subject;
use App\Models\Topic;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class MentorSeeder extends Seeder {
    /**
     * Coordenadas del centro de Tegucigalpa, Honduras
     */
    private const TEGUCIGALPA_LAT = 13.3015;
    private const TEGUCIGALPA_LON = -87.1827;

    /**
     * Datos de los mentores
     */
    private array $mentorsData = [
        [
            'name' => 'Carlos',
            'surname' => 'Hernández',
            'email' => 'carlos.hernandez@gmail.com',
            'about_me' => 'Profesor universitario con 10 años de experiencia en matemáticas y física. Especializado en cálculo diferencial e integral.',
            'disciplines' => [
                'Matemáticas' => ['Cálculo', 'Álgebra'],
                'Física' => ['Mecánica Clásica']
            ],
            'topics' => [
                'Cálculo' => ['Derivadas', 'Integrales'],
                'Álgebra' => ['Ecuaciones lineales', 'Matrices'],
                'Mecánica Clásica' => ['Cinemática', 'Dinámica']
            ]
        ],
        [
            'name' => 'María',
            'surname' => 'González',
            'email' => 'maria.gonzalez@gmail.com',
            'about_me' => 'Licenciada en Química con maestría en Bioquímica. 8 años de experiencia docente en ciencias naturales.',
            'disciplines' => [
                'Química' => ['Química Orgánica', 'Química Inorgánica'],
                'Biología' => ['Bioquímica']
            ],
            'topics' => [
                'Química Orgánica' => ['Hidrocarburos', 'Grupos funcionales'],
                'Química Inorgánica' => ['Tabla periódica', 'Enlaces químicos'],
                'Bioquímica' => ['Metabolismo', 'Enzimas']
            ]
        ],
        [
            'name' => 'Roberto',
            'surname' => 'Martínez',
            'email' => 'roberto.martinez@gmail.com',
            'about_me' => 'Ingeniero en Sistemas con experiencia en desarrollo web y móvil. Especialista en tecnologías modernas.',
            'disciplines' => [
                'Programación' => ['Desarrollo Web', 'Desarrollo Móvil'],
                'Ingeniería de Software' => ['Bases de Datos']
            ],
            'topics' => [
                'Desarrollo Web' => ['HTML/CSS', 'JavaScript'],
                'Desarrollo Móvil' => ['React Native', 'Flutter'],
                'Bases de Datos' => ['MySQL', 'PostgreSQL']
            ]
        ],
        [
            'name' => 'Ana',
            'surname' => 'López',
            'email' => 'ana.lopez@gmail.com',
            'about_me' => 'Licenciada en Letras con especialización en literatura hispanoamericana. 12 años enseñando idiomas.',
            'disciplines' => [
                'Español' => ['Gramática', 'Literatura'],
                'Inglés' => ['Gramática Inglesa']
            ],
            'topics' => [
                'Gramática' => ['Sintaxis', 'Morfología'],
                'Literatura' => ['Narrativa', 'Poesía'],
                'Gramática Inglesa' => ['Present tenses', 'Past tenses']
            ]
        ],
        [
            'name' => 'Luis',
            'surname' => 'Rodríguez',
            'email' => 'luis.rodriguez@gmail.com',
            'about_me' => 'Economista con maestría en Finanzas. Consultor empresarial con 15 años de experiencia en el sector privado.',
            'disciplines' => [
                'Economía' => ['Microeconomía', 'Macroeconomía'],
                'Finanzas' => ['Finanzas Corporativas']
            ],
            'topics' => [
                'Microeconomía' => ['Oferta y demanda', 'Elasticidad'],
                'Macroeconomía' => ['PIB', 'Inflación'],
                'Finanzas Corporativas' => ['Análisis financiero', 'Inversiones']
            ]
        ]
    ];

    public function run(): void {
        // Asegurar que existe el rol de mentor
        $mentorRole = Role::firstOrCreate(['name' => 'mentor']);

        foreach ($this->mentorsData as $index => $mentorData) {
            // 1. Crear el usuario
            $user = User::create([
                'name' => $mentorData['name'],
                'surname' => $mentorData['surname'],
                'email' => $mentorData['email'],
                'password' => Hash::make('password'),
                'account_status' => 'active',
            ]);

            // 2. Asignar rol de mentor
            $user->assignRole($mentorRole);

            // 3. Generar coordenadas aleatorias en un radio de 1km
            $coordinates = $this->generateRandomCoordinates(
                self::TEGUCIGALPA_LAT,
                self::TEGUCIGALPA_LON,
                1.0
            );

            // 4. Crear el mentor
            $mentor = Mentor::create([
                'user_id' => $user->id,
                'about_me' => $mentorData['about_me'],
                'latitude_aprox' => $coordinates['lat'],
                'longitude_aprox' => $coordinates['lon'],
                'average_rating' => rand(40, 50) / 10, // Entre 4.0 y 5.0
                'hours_taught' => rand(50, 500),
                'finalized_sessions' => rand(10, 100),
            ]);

            // 5. Procesar disciplinas y subjects
            foreach ($mentorData['disciplines'] as $disciplineName => $subjects) {
                // Crear o encontrar la disciplina
                $discipline = Discipline::firstOrCreate(['name' => $disciplineName]);

                foreach ($subjects as $subjectName) {
                    // Crear o encontrar la subject
                    $subject = Subject::firstOrCreate([
                        'name' => $subjectName,
                        'discipline_id' => $discipline->id
                    ]);

                    // Asociar el mentor con la subject (tabla pivot)
                    $mentor->subjects()->syncWithoutDetaching([$subject->id]);

                    // 6. Crear topics para esta subject
                    if (isset($mentorData['topics'][$subjectName])) {
                        foreach ($mentorData['topics'][$subjectName] as $topicName) {
                            Topic::create([
                                'topic' => $topicName,
                                'mentor_id' => $mentor->id,
                                'subject_id' => $subject->id,
                            ]);
                        }
                    }
                }
            }
        }
    }

    /**
     * Genera coordenadas aleatorias dentro de un radio específico
     */
    private function generateRandomCoordinates(float $baseLat, float $baseLon, float $radiusInKm): array {
        $radiusInDeg = $radiusInKm / 111.32;

        $u = mt_rand() / mt_getrandmax();
        $v = mt_rand() / mt_getrandmax();

        $w = $radiusInDeg * sqrt($u);
        $t = 2 * M_PI * $v;

        $x = $w * cos($t);
        $y = $w * sin($t) / cos(deg2rad($baseLat));

        return [
            'lat' => round($baseLat + $x, 6),
            'lon' => round($baseLon + $y, 6),
        ];
    }
}
