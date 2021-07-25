<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    // public function jumlahMeja(){
    //     $jumlahMeja = Transaction::where(['status_antar'=>'0'])->distinct('no_meja')->count();
    //     return $jumlahMeja;
    // }
    // public function noMeja(){
    //     $noMeja = Transaction::where(['status_antar'=>'0'])->distinct()->get('no_meja');
    //     return $noMeja;
    // }

}