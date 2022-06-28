<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method create(array $array)
 * @method findOrFail($id)
 * @method where(string $string, string $string1, $id)
 */
class BusinessOwner extends Model
{
    use HasFactory;

    protected  $fillable = [
        'business_detail_id',  'owner_status', 'twenty_five_percent_stake', 'email_address', 'phone_number', 'street_address',
        'country_id', 'state_id', 'city', 'id_card_link', 'fullname', 'position'
    ];

    public function business(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(BusinessDetail::class, 'business_detail_id');
    }

    public function country(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function state(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(State::class, 'state_id');
    }

}
