<?php

namespace App\Models;

use App\Http\Resources\NairaSolicitationResource;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

/**
 * @method static create(array $array)
 * @method where(string $string, string $string1, string $string2)
 */
class Status extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'name', 'slug'
    ];

    public function solicitations(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(NairaSolicitation::class);
    }

    public function solicitationHistory(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(NairaSolicitation::class, 'naira_solicitation_history');
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