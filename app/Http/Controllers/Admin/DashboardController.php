<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use App\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __construct()
    {
      $this->middleware('admin');

    }

    public function index(){
   $today = date("Y-m-d",strtotime(now() ) );
   $thisMonth = date("m",strtotime(now() ) );
        $todaySum = OrderItem::select(DB::raw('sum(quantity) as quantity'),'products.modal_price as modal_price','products.selling_price as selling_price')
            ->join('products', 'order_items.id_produk', '=', 'products.id')
            ->groupBy('products.name')
            ->whereDate('order_items.created_at',$today)
            ->get();
            
        $monthSum = OrderItem::select(DB::raw('sum(quantity) as quantity'),'products.modal_price as modal_price','products.selling_price as selling_price')
            ->join('products', 'order_items.id_produk', '=', 'products.id')
            ->groupBy('products.name')
            ->whereMonth('order_items.created_at',$thisMonth)
            ->get();
            
         $omzetHariIni = 0;
         $omzetBulanIni = 0;
         $keuntunganHariIni = 0;
         $keuntunganBulanIni = 0;

         foreach($todaySum as $today){
             $gross = $today->selling_price * $today->quantity;
             $omzetHariIni += $gross;
             $keuntunganHariIni += $gross - ($today->modal_price * $today->quantity);
         }
           foreach($monthSum as $month){
             $gross = $month->selling_price * $month->quantity;
             $omzetBulanIni += $gross;
             $keuntunganBulanIni += $gross - ($month->modal_price * $month->quantity);
         }
    // dd($omzetBulanIni,$keuntunganBulanIni,$omzetHariIni,$keuntunganHariIni);
         $trans = Order::all();
         return view('admin.dashboard',compact('omzetBulanIni','keuntunganBulanIni','omzetHariIni','keuntunganHariIni','trans'));
    }
    public function details($no_resi)
    {
        $details=OrderItem::where('no_resi',$no_resi)->get();

        return view('admin.details', compact('details'));
    }
    }