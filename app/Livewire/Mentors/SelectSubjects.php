<?php

namespace App\Livewire\Mentors;

use App\Models\Discipline;
use App\Models\Subject;
use Livewire\Component;

class SelectSubjects extends Component {
    public $aboutMe;

    public $disciplines;
    public $disciplineId = 1;
    public $subjects;
    public $subjectId;
    public $searchSubject;
    public $selectedSubjects = [];
    public $showTopicInput = [];
    public $topics = [];



    public function toggleTopicInput($subjectId) {
        $this->showTopicInput[$subjectId] = !($this->showTopicInput[$subjectId] ?? false);
    }

    public function addTopicFromJs($subjectId, $topicName) {
        // Si no existe aún, inicializamos el array de ese subject
        if (!isset($this->topics[$subjectId])) {
            $this->topics[$subjectId] = [];
        }

        // Evitar duplicados opcionalmente
        if (!in_array($topicName, $this->topics[$subjectId])) {
            $this->topics[$subjectId][] = $topicName;
        }

        // Ahora $this->topics tendrá algo como:
        // [ 5 => ['tema A', 'tema B'], 7 => ['otro tema'] ]
    }

    public function deselectSubject($subjectId) {
        $this->selectedSubjects = array_filter($this->selectedSubjects, function ($subject) use ($subjectId) {
            return $subject->id !== $subjectId;
        });
    }

    public function selectSubject() {
        // only add if not already selected
        if (!collect($this->selectedSubjects)->contains('id', $this->subjectId) && $this->subjectId) {
            // add the whole eloquent model
            $this->selectedSubjects[] = Subject::find($this->subjectId);
            // resets the selection
            $this->subjectId = null;
        }
    }

    public function updatedDisciplineId() {
        $this->subjects = Discipline::find($this->disciplineId)->subjects;
        $this->searchSubject = '';
        $this->subjectId = null;
    }

    public function updatedSearchSubject($text) {
        $this->subjects = Discipline::find($this->disciplineId)->subjects()
            ->where('name', 'like', '%' . $text . '%')
            ->get();
    }

    public function mount() {
        $this->disciplines = Discipline::all();
        $this->subjects = Discipline::find($this->disciplineId)->subjects;
    }

    public function render() {
        return view('livewire.mentors.select-subjects');
    }
}
