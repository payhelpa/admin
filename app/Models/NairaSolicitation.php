<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NairaSolicitation extends Model
{
    use HasFactory;

    protected  $fillable = [ 
        'user_id', 'title', 'rate', 'dollar_amount', 'amount_requested_for_in_naira', 'web_link',
        'docs_link', 'description', 'slug' , 'is_taken', 'completion_prove', 'completion_message', 'service_id', 'status_id'
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function solicitors(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function transaction(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Transaction::class);
    }

    public function service(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    public function history(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Status::class , 'naira_solicitation_history');
    }

    protected $casts = [
        'docs_link' => 'array',
        'completion_prove' => 'array'
    ];

}
