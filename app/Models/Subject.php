<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $table = 'subjects';
    protected $fillable = ['name', 'discipline_id'];


    public function mentors()
    {
        return $this->belongsToMany(Mentor::class, 'mentors_subjects', 'subject_id', 'mentor_id');
    }

    public function topics()
    {
        return $this->hasMany(Topic::class);
    }
}
