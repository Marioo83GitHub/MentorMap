<?php

namespace App\Livewire\Shared;

use App\Models\Appointment;
use App\Models\Mentor;
use App\Models\Topic;
use Auth;
use Livewire\Component;

class AppointmentsList extends Component
{
    public $appointments;



    public function mount(){
        $this-> loadapointments();
    }

    public function loadapointments(){
        $user = Auth::user();
        $query = Appointment::query();

        //Optimizar la consulta
        $query->with(['mentor.user', 'student.user', 'topic']);

        if ($user->hasRole('student')) {
            $query->where('student_id', $user->student->id);
        } elseif ($user->hasRole('mentor')) {
            $query->where('mentor_id', $user->mentor->id);
        } else {
            $this->appointments = collect(); // Si no es ni mentor ni estudiante, no muestra nada
            return;
        }

        // Buscamos las citas que son de hoy en adelante,
        // las ordenamos por la más próxima y tomamos las 5 primeras.
        $this->appointments = $query->where('scheduled_at', '>=', now())
                                    ->orderBy('scheduled_at', 'asc')
                                    ->take(5)
                                    ->get();
    }


    public function render()
    {
        return view('livewire.shared.appointments-list');
    }
}
