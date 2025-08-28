<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mentor extends Model
{
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'mentors_subjects', 'mentor_id', 'subject_id');
    }

    public function topics()
    {
        return $this->hasMany(Topic::class);
    }
}
