<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MentorSubject extends Model
{
    protected $table = 'mentors_subjects';
    protected $fillable = ['mentor_id', 'subject_id'];

    public function mentors()
    {
        return $this->belongsToMany(Mentor::class);
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class);
    }
}
