<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;

/**
 * @method create(array $array)
 * @method latest()
 * @method find($id)
 * @method where(string $string, string $string1, $id)
 */
class Offer extends Model
{
    use HasFactory, SoftDeletes, Sluggable;

    protected  $fillable = [
        'user_id', 'rate', 'offer_balance', 'title', 'slug'
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id'); 
    }

    public function solicitations(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(NairaSolicitation::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

}
