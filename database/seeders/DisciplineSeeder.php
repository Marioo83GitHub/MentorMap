<?php

namespace Database\Seeders;

use App\Models\Discipline;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DisciplineSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {

        $disciplines = [
            'Matemáticas',
            'Ciencias',
            'Arte',
            'Programación',
            'Idiomas Extranjeros',
        ];

        foreach ($disciplines as $discipline) {
            Discipline::create(['name' => $discipline]);
        }
    }
}
