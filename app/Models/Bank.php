<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 */
class Bank extends Model
{
    use HasFactory, Sluggable;

    protected  $fillable = [
        'bank_name',  'slug'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'bank_name'
            ]
        ];
    }

}
