<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * THIS HOLDS THE BUSINESS DETAILS
 * @method where(string $string, string $string1, $id)
 * @method create(array $array)
 */
class BusinessDetail extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id', 'industry_id', 'phone_number', 'business_address', 'business_name', 'business_desc',
        'rc_number', 'website', 'certificate_of_incorporation', 'memorandum', 'other_docs', 'phone_number_verified_at',
        'country_id'
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
       return $this->belongsTo(User::class, 'user_id');
    }

    public function owner(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(BusinessOwner::class);
    }

    public function industry(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Industry::class, 'industry_id');
    }

    public function services(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Service::class, 'business_service');
    }

    public function country(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

}
