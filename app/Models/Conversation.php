<?php

namespace App\Models;
use Illuminate\Support\Facades\Auth;//Agregado para la función getOtherParticipant

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    protected $table = 'conversations';
    protected $fillable = [
        'mentor_id',
        'student_id',
    ];

    public function mentor()
    {
        return $this->belongsTo(Mentor::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function lastMessage()
    {
        return $this->hasOne(Message::class)->latest('created_at');
    }

    public function getOtherParticipant()
    {
        //Si el ID del usuario asociado al mentor de esta conversación es el del usuario logueado...
        if ($this->mentor->user_id === Auth::id()) {
            //entonces devuelve el usuario del estudiante.
            return $this->student->user;
        }

        //De lo contrario, devuelve el usuario del mentor.
        return $this->mentor->user;
    }
}
