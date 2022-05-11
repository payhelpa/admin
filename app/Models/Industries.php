<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Industries extends Model
{
    use HasFactory, SoftDeletes, Sluggable;

    protected $fillable = [
        'name', 'description', 'slug'
    ];

    public function businesses(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(BusinessDetail::class);
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
