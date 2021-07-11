<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAttendanceController extends Controller
{
    public function index(Request $request){
        return view('dashboard');
    }
}