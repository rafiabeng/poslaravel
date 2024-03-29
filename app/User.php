<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $guarded=[];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function attendances(){
        return $this->hasMany(Attendance::class, 'user_id','id');
    }

    public function order(){
        return $this->belongsTo(Order::class, 'user_id','id');
    }

    public function jumlahTidakHadir($bulan){
        $hadirCount = Attendance::where(['user_id'=>$this->id,'status'=>'Masuk'])->whereMonth('date',$bulan)->count();
        $jumlahTidakHadir = 25 - $hadirCount;
        return $jumlahTidakHadir;
    }

     public function jumlahTelat($bulan){
        $telatCount = Attendance::where(['user_id'=>$this->id,'status'=>'Masuk','status_telat'=>'1'])->whereMonth('date',$bulan)->count();
        return $telatCount;
    }
}