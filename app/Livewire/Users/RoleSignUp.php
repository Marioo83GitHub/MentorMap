<?php

namespace App\Livewire\Users;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class RoleSignUp extends Component
{
    public function signUpAsMentor()
    {
        $user = Auth::user();
        if ($user) {
            // Store user id in session to use it in the mentor registration form
            // asssign role mentor to user
            $user->syncRoles(['mentor']);
            // return redirect()->route('mentor.data.signup');
            dd("Mentor");
        }
    }

    public function signUpAsStudent()
    {
        $user = Auth::user();
        if ($user) {
            // Store user id in session to use it in the mentor registration form
            // asssign role mentor to user
            $user->syncRoles(['student']);
            // return redirect()->route('student.dashboard');
            dd("Student");
        }

    }

    public function render()
    {
        return view('livewire.users.role-sign-up');
    }
}
