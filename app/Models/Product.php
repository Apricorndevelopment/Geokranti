<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'product_name',
        'price',
        'description',
    ];
   
     public function inventories()
    {
        return $this->hasMany(UserPackageInventory::class, 'product_id');
    }
}
