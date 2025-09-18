<?php

namespace App\Livewire\Users;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

// -----------------------------------------------------------------------
// Page to select which role are you going to fill data, mentor or student
// -----------------------------------------------------------------------
class RoleSignUp extends Component
{
    public function signUpAsMentor()
    {
        $user = Auth::user();
        if ($user) {
            return redirect()->route('users.mentor-sign-up');
        }
    }

    public function signUpAsStudent()
    {
        $user = Auth::user();
        if ($user) {
            return redirect()->route('users.student-sign-up');
        }

    }

    public function render()
    {
        return view('livewire.users.role-sign-up');
    }
}
