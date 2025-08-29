<?php

namespace App\Livewire\Users;

use Livewire\Component;

class RoleSignUp extends Component
{
    public function signupAsStudent()
    {
        dd("signupAsStudent");
    }

    public function signupAsMentor()
    {
        dd("signupAsMentor");
    }
    public function render()
    {
        return view('livewire.users.role-sign-up');
    }
}
