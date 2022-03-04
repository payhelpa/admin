<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method create(array $array)
 * @method find($id)
 * @method where(string $string, string $string1, $id)
 */
class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description'
    ];

    public function solicitations(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(NairaSolicitation::class);
    }

    public function individuals(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(IndividualUser::class, 'individual_user_service');
    }
}
