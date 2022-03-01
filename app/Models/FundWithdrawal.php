<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method create(array $array)
 * @method latest()
 * @method find($id)
 * @method where(string $string, string $string1, $id)
 */
class FundWithdrawal extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id', 'amount', 'bank_id', 'account_name', 'account_number', 'request_status', 'approval_status', 'approved_date'
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function bank(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Bank::class, 'bank_id');
    }



}
