<?php

namespace App\Livewire\Students;

use App\Models\Discipline;
use Livewire\Component;

class SearchMentor extends Component {
    public $showFiltersModal = false;

    public $allDisciplines = [];
    public $disciplineId = 1;
    public $subjects = [];
    public $subjectId;

    public $distanceRange = 1000;
    public $searchLatitude = null;
    public $searchLongitude = null;

    public function mount() {
        $this->allDisciplines = Discipline::all();
        $this->subjects = Discipline::find($this->disciplineId)->subjects;
    }

    public function searchMentors($currentLat, $currentLng) {

        $this->searchLatitude = $currentLat;
        $this->searchLongitude = $currentLng;

        dd(
            'disciplineId: ' . $this->disciplineId,
            'subjectId: ' . $this->subjectId,
            'distanceRange: ' . $this->distanceRange,
            'searchLatitude: ' . $this->searchLatitude,
            'searchLongitude: ' . $this->searchLongitude
        );
    }

    public function updatedDisciplineId($new_id) {
        $this->disciplineId = $new_id;
        $this->subjects = Discipline::find($new_id)->subjects;

        // $this->subjectId = $this->subjects[0]->id;
        // Most efficient way than above
        $this->subjectId = $this->subjects[0]->id ?? null;
    }

    public function render() {
        return view('livewire.students.search-mentor');
    }
}
