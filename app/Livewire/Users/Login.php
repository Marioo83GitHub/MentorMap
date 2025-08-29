<?php

namespace App\Livewire\Users;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required',
    ];

    public function login()
    {
        $this->validate();

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {

            $user = User::where('email', $this->email)->first();

            // Redireccionar según el rol
            if ($user->hasRole('admin')) {
                return redirect()->route('admin.dashboard');
            } elseif ($user->hasRole('student')) {
                return redirect()->route('student.dashboard');
            } elseif ($user->hasRole('mentor')) {
                return redirect()->route('mentor.dashboard');
            }

            // Fallback si no tiene roles específicos
            return redirect()->route('admin.dashboard');
        }

        session()->flash('error', 'Credenciales incorrectas');
    }


    public function render()
    {
        return view('livewire.users.login');
    }
}
