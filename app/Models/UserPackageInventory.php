<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserPackageInventory extends Model
{
    protected $fillable = [
        'user_ulid',
        'product_id',
        'quantity',
        'location',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_ulid', 'ulid');
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
