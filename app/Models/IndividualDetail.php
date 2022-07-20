<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * THIS HOLDS THE INDIVIDUAL USERS DETAILS
 * @method where(string $string, string $string1, $id)
 * @method create(array $array)
 */
class IndividualDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'username', 'occupation', 'phone_number', 'home_address', 'dob', 'country', 'facial_pix',
        'transaction_limit', 'valid_id', 'phone_number_verified_at', 'state_id', 'country_verified', 'valid_id_number',
        'verification_level', 'country_id', 'bank_id', 'account_number','account_name', 'bvn'
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
       return $this->belongsTo(User::class, 'user_id');
    }

    public function services(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Service::class, 'individual_service');
    }

    public function country(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function bank(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Bank::class, 'band_id');
    }

    public function state(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(State::class, 'state_id');
    }

}
