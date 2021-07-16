<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Attendance;
use App\AttendanceSetting;
use RealRashid\SweetAlert\Facades\Alert;

class UserAttendanceController extends Controller
{

    public function index(Request $request){
      return view('dashboard');   
    }

    

    public function store(Request $request)
    {
        
        $date = date("Y-m-d");
        $time = date("H:i:s");
        $attendanceSettings = AttendanceSetting::all();

        // Mengambil data setting absensi dari database
        foreach($attendanceSettings as $attendanceSetting){
            $awalCheckIn = $attendanceSetting->awal_check_in;
            $batasTelat = $attendanceSetting->batas_telat;
            $akhirCheckin = $attendanceSetting->akhir_check_in;
            $awalCheckOut = $attendanceSetting->awal_check_out;
            $akhirCheckOut = $attendanceSetting->akhir_check_out;
        }

        // Mengecek apakah sudah absen hari ini (database-side)
        $sudahCheckIn = Attendance::where('user_id',Auth::user()->id)
                                            ->where('status','Masuk')
                                            ->where('date',$date)
                                            ->first();
                                            
        $sudahCheckOut = Attendance::where('user_id',Auth::user()->id)
                                            ->where('status','Pulang')
                                            ->where('date',$date)
                                            ->first();
        

        
        // Validasi apakah sudah login
        if($request->submit == "checkin" && $sudahCheckIn){
            Alert::warning('Absen Gagal!','Anda sudah absen hari ini!');
            return redirect('/absen');
        }
        if($request->submit == "checkout" && $sudahCheckOut){
            Alert::warning('Absen Gagal!','Anda sudah checkout ini!');
            return redirect('/absen');
        }


        if($request->submit == "checkin" && $time>=$awalCheckIn && $time <= $batasTelat){
            $status = "Masuk";
            $statusTelat = "0";
        }
        else if($request->submit == "checkin" && $time>=$awalCheckIn && $time <= $akhirCheckin){
            $status = "Masuk";
            $statusTelat = "1";
        }
        else if($request->submit == "checkin" && $time>=$akhirCheckin || $time<=$awalCheckIn){
            Alert::error('Absen Gagal!','Anda belum memasuki waktu absen!');
            return redirect('/absen');
        }
        
        else if($request->submit == "checkout" && $time>=$awalCheckOut && $time <= $akhirCheckOut){
            $status = "Pulang";
        }
        else if($request->submit == "checkout" && $time>=$akhirCheckOut || $time<=$awalCheckOut){
            Alert::error('Absen Gagal!','Anda belum memasuki waktu check out!');
            return redirect('/absen');
        }

        
        //Proses insert into database
        $attendance=new Attendance();
        $attendance->user_id=Auth::user()->id;
        $attendance->time=$time;
        $attendance->date=$date;
        $attendance->status=$status;
        $attendance->status_telat=$statusTelat;
        $attendance->save();

        Alert::success('Berhasil!','Absensi anda telah tercatat!');
        return redirect('/absen');
          
      
    //   else if($this->submit == "checkout"){
    //     $attendance->user_id=Auth::user()->id;
    //     $attendance->time=$time;
    //     $attendance->date=$date;
    //     $attendance->status=$pulang;
    //     $attendance->status_telat=$statustelat;
    //     $attendance->save();

    //     Alert::success('Berhasil!','Anda berhasil Check Out');
    //     return redirect('/absen');
    //   }

        

    }
}