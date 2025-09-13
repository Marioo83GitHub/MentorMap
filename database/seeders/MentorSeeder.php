<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Mentor;
use App\Models\Subject;
use App\Models\Topic;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class MentorSeeder extends Seeder
{
    // Coordenadas para las dos ciudades
    private const TEGUCIGALPA_COORDS = ['lat' => 14.0723, 'lon' => -87.1921];
    private const CHOLUTECA_COORDS = ['lat' => 13.313846, 'lon' => -87.169518];

    // --- Pools de Datos para Realismo ---
    private array $firstNames = ['Carlos', 'Luis', 'Ana', 'María', 'José', 'Sofía', 'Javier', 'Lucía', 'David', 'Elena', 'Diego', 'Valeria', 'Adrián', 'Camila', 'Jorge', 'Isabella', 'Ricardo', 'Gabriela', 'Fernando', 'Daniela'];
    private array $lastNames = ['Hernández', 'García', 'Martínez', 'López', 'González', 'Rodríguez', 'Pérez', 'Sánchez', 'Ramírez', 'Flores', 'Gómez', 'Díaz', 'Vásquez', 'Cruz', 'Reyes', 'Morales', 'Castro', 'Ruiz', 'Álvarez', 'Mendoza'];
    private array $aboutMeTemplates = [
        'Matemáticas' => "Apasionado por los números y con {years} años de experiencia, me especializo en ayudar a estudiantes a dominar {subjects}. Mi método se enfoca en la resolución práctica de problemas.",
        'Ciencias' => "Científico de vocación con {years} años en el campo. Disfruto simplificando conceptos complejos de {subjects} para que cualquiera pueda entenderlos.",
        'Arte' => "Artista creativo con una trayectoria de {years} años. Mi objetivo es despertar la creatividad en mis estudiantes de {subjects}, explorando nuevas técnicas y perspectivas.",
        'Programación' => "Desarrollador de software con {years} años de experiencia en la industria. Me especializo en {subjects} y me encanta guiar a la próxima generación de programadores.",
        'Idiomas' => "Entusiasta de los idiomas y la comunicación, con {years} años de experiencia en la enseñanza. Hago que aprender {subjects} sea una experiencia interactiva y divertida.",
    ];

    /**
     * El método principal que ejecuta el seeder.
     */
    public function run(): void
    {
        $this->command->info('🤖 Iniciando RealisticMentorSeeder...');
        
        // --- 1. CREAR MENTORES PRINCIPALES ---
        $this->createPrincipalMentors();

        // --- 2. CREAR MENTORES ALEATORIOS ADICIONALES ---
        $subjects = Subject::with('discipline')->get();
        if ($subjects->isEmpty()) {
            $this->command->error('No se encontraron materias (subjects). Asegúrate de ejecutar SubjectSeeder primero.');
            return;
        }
        $subjectsByDiscipline = $subjects->groupBy('discipline.name');

        $this->command->info('🏙️ Creando 23 mentores en Tegucigalpa...');
        for ($i = 0; $i < 23; $i++) {
            $this->createRandomMentor(self::TEGUCIGALPA_COORDS, $subjectsByDiscipline);
        }

        $this->command->info('☀️ Creando 25 mentores en Choluteca...');
        for ($i = 0; $i < 25; $i++) {
            $this->createRandomMentor(self::CHOLUTECA_COORDS, $subjectsByDiscipline);
        }

        $this->command->info('✅ RealisticMentorSeeder completado con éxito.');
    }

    /**
     * Crea los mentores principales (Mario y José) con datos específicos.
     */
    private function createPrincipalMentors(): void
    {
        $this->command->info('👤 Creando mentores principales: Mario Carbajal y José Rueda...');

        // --- Datos para MARIO CARBAJAL ---
        $marioUser = User::firstOrCreate(
            ['email' => 'mariocarbajal@gmail.com'],
            ['name' => 'Mario Carbajal', 'surname' => '', 'password' => Hash::make('password')]
        );
        $marioUser->assignRole('mentor');
        $marioMentor = Mentor::firstOrCreate(
            ['user_id' => $marioUser->id],
            [
                'about_me' => 'Desarrollador full-stack y entusiasta de la ciencia de datos. Me especializo en Laravel y aplico modelos estadísticos y físicos para resolver problemas complejos.',
                'latitude_aprox' => self::TEGUCIGALPA_COORDS['lat'],
                'longitude_aprox' => self::TEGUCIGALPA_COORDS['lon'],
            ]
        );
        $this->assignTopicsToMentor($marioMentor, [
            'Programación Web' => ['Fundamentos de HTML', 'Estilos con CSS', 'Introducción a PHP y Laravel'],
            'Estadística' => ['Medidas de tendencia central', 'Probabilidad básica', 'Distribuciones de frecuencia'],
            'Física' => ['Cinemática', 'Leyes de Newton', 'Energía y Trabajo'],
        ]);

        // --- Datos para JOSÉ RUEDA ---
        $joseUser = User::firstOrCreate(
            ['email' => 'joserueda@gmail.com'],
            ['name' => 'José Rueda', 'surname' => '', 'password' => Hash::make('password')]
        );
        $joseUser->assignRole('mentor');
        $joseMentor = Mentor::firstOrCreate(
            ['user_id' => $joseUser->id],
            [
                'about_me' => 'Profesor de matemáticas y músico aficionado. Creo que la lógica de los números y la armonía de la música están conectadas. También ofrezco preparación para exámenes de inglés.',
                'latitude_aprox' => self::TEGUCIGALPA_COORDS['lat'],
                'longitude_aprox' => self::TEGUCIGALPA_COORDS['lon'],
            ]
        );
        $this->assignTopicsToMentor($joseMentor, [
            'Cálculo' => ['Límites y Continuidad', 'Derivadas y sus aplicaciones', 'Integrales indefinidas'],
            'Inglés' => ['Tiempos Verbales (Presente, Pasado, Futuro)', 'Verbos Modales', 'Vocabulario Esencial (Nivel A1-B1)'],
            'Música' => ['Teoría Musical Básica', 'Lectura de Partituras', 'Armonía y Acordes'],
        ]);
    }

    /**
     * Asigna un conjunto de materias y temas a un mentor específico.
     */
    private function assignTopicsToMentor(Mentor $mentor, array $subjectsAndTopics): void
    {
        foreach ($subjectsAndTopics as $subjectName => $topics) {
            $subject = Subject::where('name', $subjectName)->first();
            if ($subject) {
                // Asociar la materia (subject) con el mentor
                $mentor->subjects()->syncWithoutDetaching([$subject->id]);

                // Crear y asociar los temas (topics)
                foreach ($topics as $topicName) {
                    Topic::updateOrCreate(
                        ['mentor_id' => $mentor->id, 'subject_id' => $subject->id, 'topic' => $topicName]
                    );
                }
            }
        }
    }

    /**
     * Lógica para crear un único mentor ALEATORIO.
     */
    private function createRandomMentor(array $coords, $subjectsByDiscipline): void
    {
        $firstName = $this->firstNames[array_rand($this->firstNames)];
        $lastName = $this->lastNames[array_rand($this->lastNames)];
        $email = strtolower($firstName) . '.' . strtolower($lastName) . rand(10, 999) . '@gmaildemo.com';
        
        $user = User::firstOrCreate(
            ['email' => $email],
            ['name' => $firstName, 'surname' => $lastName, 'password' => Hash::make('password123')]
        );
        $user->assignRole('mentor');

        $disciplineNames = $subjectsByDiscipline->keys()->random(rand(1, 2));
        $selectedSubjects = collect();
        foreach ($disciplineNames as $name) {
            $selectedSubjects = $selectedSubjects->merge($subjectsByDiscipline[$name]->random(rand(1, 2)));
        }
        $selectedSubjects = $selectedSubjects->unique('id');

        $mainDiscipline = $selectedSubjects->first()->discipline->name;
        $aboutMe = str_replace(
            ['{years}', '{subjects}'],
            [rand(3, 15), $selectedSubjects->pluck('name')->implode(', ')],
            $this->aboutMeTemplates[$mainDiscipline] ?? $this->aboutMeTemplates['Ciencias']
        );
        
        $randomCoords = $this->generateRandomCoordinates($coords['lat'], $coords['lon'], 3.0);

        $mentor = Mentor::firstOrCreate(
            ['user_id' => $user->id],
            [
                'about_me' => $aboutMe,
                'latitude_aprox' => $randomCoords['lat'],
                'longitude_aprox' => $randomCoords['lon'],
                'average_rating' => rand(40, 50) / 10,
                'hours_taught' => rand(20, 800),
                'finalized_sessions' => rand(5, 200),
            ]
        );
        $mentor->subjects()->syncWithoutDetaching($selectedSubjects->pluck('id'));

        $topicIds = Topic::whereIn('subject_id', $selectedSubjects->pluck('id'))
                         ->whereNull('mentor_id')
                         ->inRandomOrder()
                         ->limit(rand(2, 5))
                         ->pluck('id');

        if ($topicIds->isNotEmpty()) {
            Topic::whereIn('id', $topicIds)->update(['mentor_id' => $mentor->id]);
        }
    }

    /**
     * Genera coordenadas aleatorias dentro de un radio específico en kilómetros.
     */
    private function generateRandomCoordinates(float $baseLat, float $baseLon, float $radiusInKm): array
    {
        $radiusInDeg = $radiusInKm / 111.32;
        $u = lcg_value();
        $v = lcg_value();
        $w = $radiusInDeg * sqrt($u);
        $t = 2 * M_PI * $v;
        $x = $w * cos($t);
        $y = $w * sin($t) / cos(deg2rad($baseLat));
        return ['lat' => round($baseLat + $x, 6), 'lon' => round($baseLon + $y, 6)];
    }
}

