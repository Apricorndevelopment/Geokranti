<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package2Details extends Model
{
    protected $table = 'package2_details';
    protected $fillable = ['package2_id', 'rate', 'time', 'capital', 'profit_share'];

     public function package2()
    {
        return $this->belongsTo(Package2::class, 'package2_id');
    }

}