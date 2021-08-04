<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InsightController extends Controller
{
    public function __construct()
    {
      $this->middleware('admin');

    }
    public function index(){
        
        $thisMonth = date("m",strtotime(now() ) );
      
            $sum = OrderItem::select(DB::raw('sum(quantity) as quantity'), 'products.name as name')
            ->join('products', 'order_items.id_produk', '=', 'products.id')
            ->groupBy('products.name')
            ->orderByDesc('quantity')
            ->whereMonth('order_items.created_at',$thisMonth)
            ->get();
            $totalQuantity = 0;
            foreach($sum as $product){
                $totalQuantity += $product->quantity;
            }
            if($sum == NULL){
                $sum=0;
                $totalQuantity=0;
                $produkFavorit=NULL;
            }
        
        
        
        
        return view('admin.products.insight',compact('sum','totalQuantity',));
    }
}