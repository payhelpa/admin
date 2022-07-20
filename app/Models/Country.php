<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method where(string $string, string $string1, $slug)
 * @method create(array $array)
 */
class Country extends Model
{
    use HasFactory, SoftDeletes, Sluggable;

    protected  $fillable = [
        'name', 'logo' , 'phone_number_code' ,'currency' , 'currency_symbol' , 'slug'
    ];

    public function states(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(State::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
