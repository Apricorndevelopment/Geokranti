<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package1 extends Model
{
    protected $table = 'package1';
    protected $fillable = ['package_name', 'package_quantity', 'description', 'price', 'discount', 'discount_per'];

    public $timestamps = false;

    
    public function transactions()
    {
        return $this->hasMany(PackageTransaction::class);
    }
}


