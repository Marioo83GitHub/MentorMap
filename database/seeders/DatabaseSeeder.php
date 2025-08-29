<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $user = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@mm.com',
            'password' => bcrypt('123'),
        ]);
        $admin = Role::create(['name' => 'admin']);
        $user->assignRole($admin);

        $user = User::factory()->create([
            'name' => 'Student',
            'email' => 'student@gmail.com',
            'password' => bcrypt('123'),
        ]);
        $student = Role::create(['name' => 'student']);
        $user->assignRole($student);

        $user = User::factory()->create([
            'name' => 'Mentor',
            'email' => 'mentor@gmail.com',
            'password' => bcrypt('123'),
        ]);
        $mentor = Role::create(['name' => 'mentor']);
        $user->assignRole($mentor);
    }
}
