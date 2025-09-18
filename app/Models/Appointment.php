<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $table = 'appointments';
    protected $fillable = [
        'scheduled_at',
        'mentor_id',
        'student_id',
        'topic_id',
        'status',
        'duration',
        'mentor_present',
        'student_present',
        'notes',
        'mentorship_id',
    ];

    public function mentor()
    {
        return $this->belongsTo(Mentor::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function mentorship()
    {
        return $this->belongsTo(Mentorship::class);
    }

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }
}
