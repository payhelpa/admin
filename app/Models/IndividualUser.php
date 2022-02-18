<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndividualUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'occupation', 'phone_number', 'home_address', 'dob', 'country', 'facial_pix',
        'transaction_limit', 'valid_id', 'phone_number_verified_at', 'state_id', 'country_verified'
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function services(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Service::class, 'individual_user_service');
    }
}
