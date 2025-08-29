<?php

namespace App\Livewire\Users;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class RoleSignUp extends Component
{
    public function signUpAsMentor()
    {
        // Redireccionar a la ruta de registro de estudiantes
    }

    public function signUpAsStudent()
    {
        // Redireccionar a la ruta de registro de estudiantes
    }

    public function render()
    {
        return view('livewire.users.role-sign-up');
    }
}
