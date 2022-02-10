<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Traits\UsesUuidTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;

/**
 * @method create(array $array)
 * @method find($id)
 * @method where(string $string, string $string1, $id)
 * @property mixed $role
 */
class User extends Authenticatable implements  MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, Sluggable;

    protected $fillable = [
        'name', 'email', 'password', 'email_verified_at', 'role_id', 'account_verified_at', 'kyc_verified'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function business(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(BusinessUser::class);
    }

    public function individual(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(IndividualUser::class);
    }

    public function role(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function wallet(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Wallet::class);
    }

    public function hasRole($role): bool
    {
        if ($this->role->name == $role) {
            return true;
        }else {
            return false;
        }
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
