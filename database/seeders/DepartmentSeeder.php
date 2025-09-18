<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Department::create(['name' => 'Choluteca', 'country_id' => 1]);
        Department::create(['name' => 'Francisco Morazán', 'country_id' => 1]);
        Department::create(['name' => 'Olancho', 'country_id' => 1]);

        Department::create(['name' => 'Managua', 'country_id' => 2]);
        Department::create(['name' => 'León', 'country_id' => 2]);
        Department::create(['name' => 'Granada', 'country_id' => 2]);
    }
}
