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
        'name'
    ];

    public function individuals(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(IndividualUser::class);
    }

    public function business(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(BusinessUser::class);
    }


}
