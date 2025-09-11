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
            'Desarrollo de Software',
            'Ciencias Sociales',
            'Arte Prehistorico',
            'Fisica',
            'Literatura',
        ];

        foreach ($disciplines as $discipline) {
            Discipline::create(['name' => $discipline]);
        }
    }
}
