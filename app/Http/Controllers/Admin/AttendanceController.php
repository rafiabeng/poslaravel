<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
      public function __construct()
    {
      $this->middleware('admin');

    }
    public function index(Request $request){
        $bulan = intval(date("m"));
        $bulan2 = $bulan -= 1;
        if($request->bulan){
            $bulan = intval($request->bulan);
        }
        
        $namabulan = date('F', mktime(0, 0, 0, $bulan));
        $users = User::all();
        return view('admin.attendance.index',compact('bulan','users','namabulan',));
    }
}