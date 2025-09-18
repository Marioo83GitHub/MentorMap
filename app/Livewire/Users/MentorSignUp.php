<?php

namespace App\Livewire\Users;

use App\Models\Country;
use App\Models\Mentor;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class MentorSignUp extends Component
{
    use WithFileUploads;

    public $countries;
    public $departments;

    public $name;
    public $surname;
    public $sex;
    public $id_number;
    public $phone;
    public $birth_date;
    public $photo;
    public $country_id;
    public $department_id;

    // public $about_me;

    public function mount()
    {
        if (Auth::user()->hasRole('mentor')) {
            return redirect()->route('mentors.dashboard');
        }
        $this->countries = Country::orderBy('name')->get();
        $this->country_id = 1; // Default to first country (Honduras)
    }

    public function saveMentorData()
    {
        // Validate input data
        $this->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'sex' => 'required',
            'id_number' => 'required|max:24|unique:users,id_number',
            'phone' => 'required|string|max:15',
            'birth_date' => 'required|date',
            'photo' => 'nullable|image|max:2048', // Optional profile photo

            // 'about_me' => 'required',
        ]);

        $user = Auth::user();
        $user->name = $this->name;
        $user->surname = $this->surname;
        $user->id_number = $this->id_number;
        $user->phone = $this->phone;
        $user->birth_date = $this->birth_date;
        $user->sex = $this->sex;
        $user->department_id = $this->department_id;

        if ($this->photo) {
            $photoPath = $this->photo->store(
                'profiles/' . $user->id, // carpeta única por usuario
                'public'
            );
            $user->profile_picture_path = $photoPath;
        }

        $mentor = new Mentor;
        // $mentor->about_me = $this->about_me;
        $mentor->user_id = $user->id;

        $user->save();
        $mentor->save();

        $user->assignRole('mentor');

        $this->redirectRoute('mentors.select-location');
    }

    public function render()
    {
        $this->departments = Country::find($this->country_id)->departments()->orderBy('name')->get();

        // Gets the first department of the list of the selected country
        if ($this->departments->count() > 0) {
            $this->department_id = $this->departments[0]->id;
        }

        return view('livewire.users.mentor-sign-up');
    }
}
