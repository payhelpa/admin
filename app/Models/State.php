<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 */
class State extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'country_id'
    ];

    public function country(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function individuals(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(IndividualDetail::class);
    }

    public function business(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(BusinessDetail::class);
    }


}
