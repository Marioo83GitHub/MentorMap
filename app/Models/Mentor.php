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
        'price_per_hour',
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

    // public function disciplines() {
    //     return $this->belongsToMany(
    //         Discipline::class,
    //         'mentors_subjects', // tabla pivot
    //         'mentor_id',        // foreign key del mentor en la pivot
    //         'subject_id'        // foreign key del subject en la pivot
    //     )
    //         ->join('subjects', 'mentors_subjects.subject_id', '=', 'subjects.id')
    //         ->join('disciplines', 'subjects.discipline_id', '=', 'disciplines.id')
    //         ->select('disciplines.*')
    //         ->distinct();
    // }

    public function topics() {
        return $this->hasMany(Topic::class);
    }
}
