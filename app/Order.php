<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    public function orderitem(){
        return $this->hasMany(OrderItem::class, 'no_resi','no_resi');
    }
    public function kasir(){
        return $this->belongsTo(User::class, 'id_user','id');
    }
}