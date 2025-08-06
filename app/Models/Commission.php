<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commission extends Model
{
    protected $table = 'commissions';
    protected $fillable = ['user_id' , 'from_ulid' , 'from_name' , 'purchase_amount' , 'commission' , 'level'];
}
