<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LevelIncome extends Model
{
    protected $table = 'level_incomes';
    protected $fillable = [
        'user_id',
        'user_ulid',
        'from_user_id',
        'from_user_ulid',
        'from_user_name',
        'purchase_amount',
        'level',
        'percentage',
        'amount',
        'package_id',
        'package_name',
        'distribution_date',
        'months_remaining',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function fromUser()
    {
        return $this->belongsTo(User::class, 'from_user_id');
    }
    
    public function package()
    {
        return $this->belongsTo(Package2::class);
    }
}