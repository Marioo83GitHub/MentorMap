<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'reviews';

    protected $fillable = [
        'rating',
        'comment',
        'mentorship_id',
        'student_id',
    ];

    public function mentorship()
    {
        return $this->belongsTo(Mentorship::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
