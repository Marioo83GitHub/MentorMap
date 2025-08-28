<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IdentityVerification extends Model
{
    protected $table = 'identity_verifications';
    protected $fillable = [
        'front_id_card_path',
        'back_id_card_path',
        'person_photo_path',
        'submit_date',
        'reject_reasons',
        'verified',
        'user_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
