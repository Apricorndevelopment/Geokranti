<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package2Purchase extends Model
{
    protected $table = 'package2_purchases';
    protected $fillable = [
        'user_id',
        'ulid',
        'package2_id',
        'package2_detail_id',
        'package_name',
        'quantity',
        'rate',
        'capital',
        'time',
        'profit_share',
        'final_price',
        'purchased_at'
    ];

    protected $casts = [
        'time' => 'integer',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function package2()
    {
        return $this->belongsTo(Package2::class);
    }

    public function rateDetail()
    {
        return $this->belongsTo(Package2Details::class, 'package2_detail_id');
    }
}
