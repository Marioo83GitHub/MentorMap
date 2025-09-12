<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mentor extends Model {
    protected $table = 'mentors';
    protected $fillable = [
        'about_me',
        'average_rating',
        'hours_taught',
        'finalized_sessions',
        'latitude_aprox',
        'longitude_aprox',
        'user_id',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function subjects() {
        return $this->belongsToMany(Subject::class, 'mentors_subjects', 'mentor_id', 'subject_id');
    }

    public function disciplines() {
        return $this->hasManyThrough(
            Discipline::class,
            Subject::class,
            'id', // Foreign key on subjects table (subject_id in pivot)
            'id', // Foreign key on disciplines table
            'id', // Local key on mentors table
            'discipline_id' // Local key on subjects table
        )->distinct();
    }

    public function topics() {
        return $this->hasMany(Topic::class);
    }
}
