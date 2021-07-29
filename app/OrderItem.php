<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $guarded = [];
     public function order(){
        return $this->belongsTo(Order::class,'no_resi','no_resi');
    }
}