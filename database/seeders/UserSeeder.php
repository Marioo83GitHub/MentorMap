<?php

namespace Database\Seeders;

use App\Models\Mentor;
use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        $user = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@mm.com',
            'password' => bcrypt('123'),
        ]);
        $user->assignRole(Role::create(['name' => 'admin']));


        $user = User::factory()->create([
            'name' => 'Student',
            'email' => 'student@gmail.com',
            'password' => bcrypt('123'),
        ]);
        $user->assignRole(Role::create(['name' => 'student']));
        // create student
        Student::create([
            'user_id' => $user->id,
        ]);


        $user = User::factory()->create([
            'name' => 'Mentor',
            'email' => 'mentor@gmail.com',
            'password' => bcrypt('123'),
        ]);
        $user->assignRole(Role::create(['name' => 'mentor']));
        // create student
        Mentor::create([
            'user_id' => $user->id,
        ]);

        $user = User::factory()->create([
            'email' => 'mario@gmail.com',
            'password' => bcrypt('123'),
        ]);
    }
}
