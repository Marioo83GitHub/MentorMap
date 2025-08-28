<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';

    protected $fillable = [
        'type',
        'amount',
        'wallet_id',
        'admin_notes',
    ];
    public const TYPE_SESSION_INCOME = 'SESSION_INCOME';
    public const TYPE_APP_COMMISSION = 'APP_COMMISSION';
    public const TYPE_WITHDRAWAL = 'WITHDRAWAL';
    public const TYPE_REFUND = 'REFUND';
    public const TYPE_MANUAL_ADJUSTMENT = 'MANUAL_ADJUSTMENT';

    public function wallet()
    {
        return $this->belongsTo(Wallet::class);
    }
}
