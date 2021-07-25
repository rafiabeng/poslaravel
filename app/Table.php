<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    public function carts(){
        return $this->hasMany(Cart::class,'no_meja','nomor_meja');
    }
}