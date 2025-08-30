<?php

namespace App\Livewire\Users;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;

    public $registerEmail;
    public $registerPassword;
    public $registerConfirmPassword;

    public function login()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {


            $user = User::where('email', $this->email)->first();

            // Redireccionar según el rol

            if ($user->hasRole('student')) {
                return redirect()->route('student.dashboard');
            }
            elseif ($user->hasRole('mentor')) {
                return redirect()->route('mentor.dashboard');
            }
            elseif ($user->hasRole('admin')) {
                dd("Admin role does nothing yet");
                // return redirect()->route('admin.dashboard');
            }
            elseif (!$user->hasAnyRole(['student', 'mentor'])) {
                return $this->redirectRoute('role-sign-up');
            }

            dd("Falta hacer la logica de verificar si tiene roles y redirigir a otras vistas");

            // De momento logout, pero debería enviarse a la página donde le pregunta si quiere ser mentor o student
            $this->logout(request());
        }

        session()->flash('error', 'Credenciales incorrectas');
    }

    public function formSignUp()
    {
        // create user with email and password
        $this->validate([
            'registerEmail' => 'required|email|unique:users,email',
            'registerPassword' => 'required',
            'registerConfirmPassword' => 'required',
        ]);

        if ($this->registerPassword !== $this->registerConfirmPassword) {
            session()->flash('error', 'Las contraseñas no coinciden');
            return;
        }

        $user = User::create([
            'email' => $this->registerEmail,
            'password' => bcrypt($this->registerPassword),
        ]);

        if (Auth::attempt(['email' => $this->registerEmail, 'password' => $this->registerPassword])) {
            // Redireccionar a la página de selección de rol
            return redirect()->route('role-sign-up');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function render()
    {
        return view('livewire.users.login');
    }
}
