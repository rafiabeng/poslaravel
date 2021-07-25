<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function cart(){
        return $this->hasMany(Cart::class, 'id_produk','id');
    }
}