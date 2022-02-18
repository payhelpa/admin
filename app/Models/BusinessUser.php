<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'phone_number', 'company_address', 'ceo_name', 'office_address', 'cac_number', 'phone_number_verified_at',
        'state_id', 'country', 'country_verified'
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
