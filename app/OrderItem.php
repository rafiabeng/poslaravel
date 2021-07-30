<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $guarded = [];
     public function order(){
        return $this->belongsTo(Order::class,'no_resi','no_resi');
    }

    public function product(){
return $this->belongsTo(Product::class,'id_produk','id');
    }
    public function kasir(){
        return $this->belongsTo(User::class, 'id_user','id');
    }
}