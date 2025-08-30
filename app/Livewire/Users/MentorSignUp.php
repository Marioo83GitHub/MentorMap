<?php

namespace App\Livewire\Users;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MentorSignUp extends Component
{
    public $name;
    public $surname;
    public $id_number;
    public $phone;
    public $birth_date;
    public $sex;
    public $photo;

    public $about_me;

    public function saveMentorData()
    {
        dd();
        // Validate input data
        $this->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'id_number' => 'required|string|max:20|unique:users,id_number',
            'phone' => 'required|string|max:15',
            'birth_date' => 'required|date',
            'photo' => 'nullable|image|max:2048', // Optional profile photo
        ]);

        // Save data to the database
        $user = Auth::user();
        $user->name = $this->name;
        $user->surname = $this->surname;
        $user->id_number = $this->id_number;
        $user->phone = $this->phone;
        $user->birth_date = $this->birth_date;
    }

    public function render()
    {
        return view('livewire.users.mentor-sign-up');
    }
}
