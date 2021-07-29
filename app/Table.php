<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    public function carts(){
        //mengambil data pesanan yang status antarnya = 0
        return Cart::where(['no_meja'=>$this->nomor_meja,'status_antar'=>0])->get();
    }
}