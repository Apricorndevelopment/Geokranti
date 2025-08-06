<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MoneyWithdrawl extends Model
{
    protected $table = 'money_withdrawl';
    protected $fillable = [
        'user_id',
        'user_ulid',
        'total_amount',
        'tds_charge',
        'admin_charge',
        'credited_amount',
        'status',
        'payment_method',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
