<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    protected $table = 'wallets';

    protected $fillable = [
        'user_id',
        'available_balance',
        'held_balance',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
