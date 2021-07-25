<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Table;
class TablesController extends Controller
{
     public function index()
    {
        $tables=Table::all();
        return view('tables',compact('tables'));
    }
}