<?php

namespace App\Livewire\Mentors;

use App\Models\Mentor;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class SelectLocation extends Component {

    #[On('saveMentorLocation')]
    public function saveLocationDB($latitude, $longitude) {

        // add noise between 200m and 800m
        $distortedLat = $latitude + (rand(18, 72) / 10000) * (rand(0, 1) ? 1 : -1);
        $distortedLng = $longitude + (rand(18, 72) / 10000) * (rand(0, 1) ? 1 : -1);
        // Latitude: 13.301325571500803
        // Longitud: -87.18315504736756
        // dd($latitude, $longitude, $distortedLat, $distortedLng);
        $mentor = Mentor::where('user_id', Auth::id())->first();
        if ($mentor) {
            $mentor->latitude_aprox = $distortedLat;
            $mentor->longitude_aprox = $distortedLng;
            $mentor->save();
        }

        $this->redirectRoute('mentors.dashboard');
    }

    public function render() {
        return view('livewire.mentors.select-location');
    }
}
