<?php

namespace Database\Seeders;

use App\Models\Discipline;
use App\Models\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        $data = [
            'Matemáticas' => [
                'Álgebra',
                'Geometría',
                'Cálculo',
                'Estadística',
            ],
            'Ciencias' => [
                'Física',
                'Química',
                'Biología',
            ],
            'Arte' => [
                'Dibujo',
                'Pintura',
                'Música',
            ],
            'Programación' => [
                'Python',
                'Java',
                'JavaScript',
                'Bases de Datos',
            ],
            'Idiomas Extranjeros' => [
                'Inglés',
                'Francés',
                'Alemán',
            ],
        ];

        foreach ($data as $disciplineName => $subjects) {
            $discipline = Discipline::where('name', $disciplineName)->first();

            if ($discipline) {
                foreach ($subjects as $subjectName) {
                    Subject::firstOrCreate([
                        'name' => $subjectName,
                        'discipline_id' => $discipline->id,
                    ]);
                }
            }
        }
    }
}
