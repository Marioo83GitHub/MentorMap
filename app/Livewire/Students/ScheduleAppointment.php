<?php

namespace App\Livewire\Students;

use App\Models\Appointment;
use App\Models\Discipline;
use App\Models\Mentor;
use App\Models\Mentorship;
use App\Models\Subject;
use App\Models\Topic;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Collection;

class ScheduleAppointment extends Component
{
    public $showModal = false;
    public $mentor_id;
    public $isNewMentorship = false;

    // Propiedades para los selects en cascada
    public Collection $disciplines;
    public Collection $subjects;
    public Collection $topics;

    // Propiedades para los valores seleccionados
    public $selectedDiscipline = '';
    public $selectedSubject = '';
    public $topic_id = ''; // El valor final que se guardará

    // Propiedades para la MENTORÍA (si es nueva)
    public $mentorship_title;
    
    // Propiedades para la CITA
    public $scheduled_at;
    public $duration = 1;

    public function mount()
    {
        // Inicializar colecciones vacías para evitar errores
        $this->disciplines = collect();
        $this->subjects = collect();
        $this->topics = collect();
    }

    #[On('openScheduleModal')]
    public function openScheduleModal($mentorId)
    {
        $this->reset(); 
        $this->mount(); // Reinicializa las colecciones
        $this->mentor_id = $mentorId;
        
        $mentor = Mentor::find($this->mentor_id);
        if ($mentor) {
            // Carga las DISCIPLINAS únicas que este mentor enseña
            $this->disciplines = $mentor->subjects()->with('discipline')->get()->pluck('discipline')->unique('id');
        }

        // Revisa si ya existe una mentoría
        $studentId = Auth::user()->student->id;
        $existingMentorship = Mentorship::where('student_id', $studentId)
            ->where('mentor_id', $this->mentor_id)
            ->where('active', true)
            ->first();

        $this->isNewMentorship = !$existingMentorship;
        $this->showModal = true;
    }

    // Se ejecuta cuando el usuario elige una DISCIPLINA
    public function updatedSelectedDiscipline($disciplineId)
    {
        $this->subjects = collect();
        $this->topics = collect();
        $this->selectedSubject = '';
        $this->topic_id = '';

        if ($disciplineId) {
            $mentor = Mentor::find($this->mentor_id);
            // Carga las ASIGNATURAS de esa disciplina que el mentor enseña
            $this->subjects = $mentor->subjects()->where('discipline_id', $disciplineId)->get();
        }
    }

    // Se ejecuta cuando el usuario elige una ASIGNATURA
    public function updatedSelectedSubject($subjectId)
    {
        $this->topics = collect();
        $this->topic_id = '';

        if ($subjectId) {
            // Carga los TEMAS de esa asignatura que el mentor enseña
            $this->topics = Topic::where('mentor_id', $this->mentor_id)
                ->where('subject_id', $subjectId)
                ->get();
        }
    }

    public function saveAppointment()
    {
        $studentId = Auth::user()->student->id;
        $mentorship = null; // Usaremos una variable para la mentoría

        // --- CAMBIO 1: La regla del título ahora está fuera del if ---
        $rules = [
            'selectedDiscipline' => 'required',
            'selectedSubject' => 'required',
            'topic_id' => 'required|exists:topics,id',
            'scheduled_at' => 'required|date|after:now',
            'duration' => 'required|integer|min:1|max:4',
            'mentorship_title' => 'required|string|max:255', // Siempre requerido
        ];

        $this->validate($rules);

        // --- CAMBIO 2: Lógica unificada para obtener o crear la mentoría ---
        // Buscamos si ya existe una mentoría activa
        $mentorship = Mentorship::where('student_id', $studentId)
            ->where('mentor_id', $this->mentor_id)
            ->where('active', true)
            ->first();

        if ($mentorship) {
            // Si ya existe, actualizamos su título
            $mentorship->update(['title' => $this->mentorship_title]);
        } else {
            // Si no existe, la creamos
            $mentorship = Mentorship::create([
                'title' => $this->mentorship_title,
                'mentor_id' => $this->mentor_id,
                'student_id' => $studentId,
            ]);
        }

        // Finalmente, creamos la cita usando el ID de la mentoría
        Appointment::create([
            'mentorship_id' => $mentorship->id,
            'mentor_id' => $this->mentor_id,
            'student_id' => $studentId,
            'topic_id' => $this->topic_id,
            'scheduled_at' => $this->scheduled_at,
            'duration' => $this->duration,
        ]);

        $this->closeModal();
        session()->flash('success', '¡Sesión agendada correctamente!');
        $this->dispatch('appointmentsUpdated');
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
