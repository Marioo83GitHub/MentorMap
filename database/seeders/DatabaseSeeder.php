<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(CountrySeeder::class);
        $this->call(DepartmentSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ChatSeeder::class);
        $this->call(MentorSeeder::class);
        $this->call(DisciplineSeeder::class);
        $this->call(SubjectSeeder::class);
    }
}
