<?php

namespace App\Livewire\Users;

use Livewire\Component;

class RoleSignUp extends Component
{
    public function signUpAsMentor()
    {
        // Redireccionar a la ruta de registro de Mentores con verificación y toda la onda
        dd("Mentor");
    }

    public function signUpAsStudent()
    {
        // Redireccionar a la ruta de registro de estudiantes
        dd("Student");
    }

    public function render()
    {
        return view('livewire.users.role-sign-up');
    }
}
