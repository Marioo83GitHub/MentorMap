<?php

namespace App\Livewire\Users;

use App\Models\Country;
use App\Models\Mentor;
use Faker\Extension\CountryExtension;
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


    public $about_me;

    public function mount()
    {
        $this->countries = Country::all();
        $this->country_id = 1; // Default to first country (Honduras)
        $this->department_id = 1; // Default to first department (Choluteca)
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

            'about_me' => 'required',
        ]);

        // Save data to the database
        $user = Auth::user();
        $user->name = $this->name;
        $user->surname = $this->surname;
        $user->id_number = $this->id_number;
        $user->phone = $this->phone;
        $user->birth_date = $this->birth_date;
        $user->sex = $this->sex;

        if ($this->photo) {
            $photoPath = $this->photo->store('profiles', 'public');
            $user->photo = $photoPath;
        }

        $mentor = new Mentor;
        $mentor->about_me = $this->about_me;
        $mentor->user_id = $user->id;

        $user->save();
        $mentor->save();

        $this->redirectRoute('mentor.select-location');
    }

    public function render()
    {
        // Countries

        $this->departments = Country::find($this->country_id)->departments;

        return view('livewire.users.mentor-sign-up');
    }
}
