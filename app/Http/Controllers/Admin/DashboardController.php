<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // public function __construct()
    // {
    //   $this->middleware(function ($request, $next) {
    //         if (auth()->user()->jabatan == "karyawan") {
    //            return redirect('/absen');
    //         }
    //     });

    // }

    public function index(){
    //    dd(Auth::user());

        $today = 50000;
        return view('admin.dashboard',compact('today'));
    }
}