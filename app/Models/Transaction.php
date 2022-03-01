<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory; 

    protected  $fillable = [
        'user_id', 'naira_solicitation_id', 'settlement_id', 'amount_paid', 'is_payment_confirmed',
        'payment_type', 'account_number'
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function solicitation(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(NairaSolicitation::class, 'naira_solicitation_id');
    }
}
