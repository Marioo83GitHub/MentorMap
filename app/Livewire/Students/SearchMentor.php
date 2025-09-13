<?php

namespace App\Livewire\Students;

use App\Models\Conversation;
use App\Models\Discipline;
use App\Models\Mentor;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SearchMentor extends Component {

    public $allDisciplines = [];
    public $disciplineId = 1;
    public $subjects = [];

    public $distanceRange = 1000;
    public $searchLatitude = null;
    public $searchLongitude = null;
    public $mentorsFound = [];

    public $selectedMentorId = null;
    public $selectedMentorSubjects = [];

    public function mount() {
        $this->allDisciplines = Discipline::all();
        $this->subjects = Discipline::find($this->disciplineId)->subjects;
    }

    public function sendMessage($mentorId) {
        $conversation = Conversation::firstOrCreate([
            'mentor_id' => $mentorId,
            'student_id' => Auth::user()->student->id,
        ]);
        return $this->redirectRoute('students.chat', ['conversationId' => $conversation->id]);
    }

    public function showMentorProfile($mentorId) {
        $this->selectedMentorId = $mentorId;

        // Obtener las subjects del mentor agrupadas por discipline
        $mentor = Mentor::with(['subjects.discipline'])->find($mentorId);

        if ($mentor) {
            $this->selectedMentorSubjects = $mentor->subjects
                ->groupBy('discipline.name')
                ->map(function ($subjects, $disciplineName) {
                    return [
                        'discipline_name' => $disciplineName,
                        'discipline_id' => $subjects->first()->discipline->id,
                        'subjects' => $subjects->map(function ($subject) {
                            return [
                                'id' => $subject->id,
                                'name' => $subject->name,
                            ];
                        })->values()
                    ];
                })->values()->toArray();
        }
    }

    public function closeMentorProfile() {
        $this->selectedMentorId = null;
        $this->selectedMentorSubjects = [];
    }

    public function searchMentors($currentLat, $currentLng) {
        $this->searchLatitude = $currentLat;
        $this->searchLongitude = $currentLng;

        // Convertimos metros a grados aprox
        $distanceInKm = $this->distanceRange / 1000;

        // 1 grado latitud ≈ 111 km
        $deltaLat = $distanceInKm / 111;

        // 1 grado longitud ≈ 111 km * cos(lat)
        $deltaLng = $distanceInKm / (111 * cos(deg2rad($this->searchLatitude)));

        $minLat = $this->searchLatitude - $deltaLat;
        $maxLat = $this->searchLatitude + $deltaLat;
        $minLng = $this->searchLongitude - $deltaLng;
        $maxLng = $this->searchLongitude + $deltaLng;

        $this->mentorsFound = Mentor::query()
            ->whereBetween('latitude_aprox', [$minLat, $maxLat])
            ->whereBetween('longitude_aprox', [$minLng, $maxLng])
            ->get();
    }

    public function render() {
        return view('livewire.students.search-mentor');
    }
}
