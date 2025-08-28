<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $table = 'topics';
    protected $fillable = ['topic', 'mentor_id', 'subject_id'];
    public function mentor()
    {
        return $this->belongsTo(Mentor::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
