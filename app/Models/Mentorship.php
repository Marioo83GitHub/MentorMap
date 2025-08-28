<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mentorship extends Model
{
    protected $table = 'mentorships';

    protected $fillable = [
        'title',
        'description',
        'mentor_id',
        'student_id',
        'active',
    ];

    public function mentor()
    {
        return $this->belongsTo(Mentor::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
