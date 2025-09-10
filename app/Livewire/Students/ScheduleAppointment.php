<?php

namespace App\Livewire\Students;

use App\Models\Appointment;
use App\Models\Mentor;
use App\Models\Mentorship;
use App\Models\Topic;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\On;

class ScheduleAppointment extends Component
{
    public $showModal = false;
    public $mentor_id;
    public $isNewMentorship = false;

    // Propiedades para la CITA
    public $scheduled_at;
    public $notes;
    public $topic_id; // El topic ahora pertenece a la cita
    public $topics = [];

    // Propiedades para la MENTORÍA (si es nueva)
    public $mentorship_title;
    public $mentorship_description;
    

    #[On('openScheduleModal')]
    public function openScheduleModal($mentorId)
    {
        $this->reset(); 
        $this->resetValidation();
        $this->mentor_id = $mentorId;
        $studentId = Auth::user()->student->id;
        
        // Carga los temas que el mentor enseña para mostrarlos en el dropdown
        $mentor = Mentor::find($this->mentor_id);
        if ($mentor) {
            $this->topics = Topic::where('mentor_id', $mentor->id)->get();
        }

        // Busca si ya hay una mentoría activa entre ellos para saber si mostrar los campos de título/descripción
        $existingMentorship = Mentorship::where('student_id', $studentId)
            ->where('mentor_id', $this->mentor_id)
            ->where('active', true)
            ->first();

        if ($existingMentorship) {
            $this->isNewMentorship = false;
        } else {
            $this->isNewMentorship = true;
        }

        $this->showModal = true;
    }

    public function saveAppointment()
    {
        $studentId = Auth::user()->student->id;
        $mentorshipId = null;

        // Reglas de validación base (topic_id ahora es siempre requerido)
        $rules = [
            'scheduled_at' => 'required|date|after:now',
            'notes' => 'nullable|string|max:1000',
            'topic_id' => 'required|exists:topics,id',
        ];

        // Si es una nueva mentoría, añade reglas para los nuevos campos
        if ($this->isNewMentorship) {
            $rules['mentorship_title'] = 'required|string|max:255';
            $rules['mentorship_description'] = 'nullable|string|max:1000';
        }

        $this->validate($rules);

        // Busca o crea la mentoría. AHORA SIN EL TOPIC_ID.
        if ($this->isNewMentorship) {
            $newMentorship = Mentorship::create([
                'title' => $this->mentorship_title,
                'description' => $this->mentorship_description,
                'mentor_id' => $this->mentor_id,
                'student_id' => $studentId,
                'active' => true,
            ]);
            $mentorshipId = $newMentorship->id;
        } else {
            // Si ya existía, usamos su ID
            $mentorshipId = Mentorship::where('student_id', $studentId)
                ->where('mentor_id', $this->mentor_id)
                ->where('active', true)
                ->firstOrFail()->id;
        }

        // Creamos la cita (appointment), AHORA CON EL TOPIC_ID.
        Appointment::create([
            'mentor_id' => $this->mentor_id,
            'student_id' => $studentId,
            'mentorship_id' => $mentorshipId,
            'topic_id' => $this->topic_id,
            'scheduled_at' => $this->scheduled_at,
            'notes' => $this->notes,
        ]);

        $this->closeModal();
        session()->flash('success', '¡Sesión agendada correctamente!');
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->reset();
    }

    public function render()
    {
        return view('livewire.students.schedule-appointment');
    }
}

