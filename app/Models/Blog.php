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
class Blog extends Model
{
    use HasFactory, SoftDeletes, Sluggable;

    protected $fillable = [
        'title', 'body', 'cover_image', 'tags', 'slug'
    ];

    public function comments(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(BlogComment::class);
    }
    public function likes(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(BlogLike::class);
    }

    protected $casts = [
        'tags' => 'array'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
