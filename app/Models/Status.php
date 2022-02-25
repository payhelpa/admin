<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;
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
}
