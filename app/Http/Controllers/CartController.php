<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Order;
use App\OrderItem;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class CartController extends Controller
{
    public function index($no_meja){
        $products = Product::paginate(12);
        $cartItems = Cart::where('no_meja',$no_meja)->get();     

       return view ('cart',compact('products','no_meja','cartItems'));
    }
    public function store(Request $request){
        $noMeja = $request->noMeja;
       // $cartItems = Cart::where(['no_meja'=>$request->noMeja]);
       
        // dd($cartItems);
        if(Cart::where(['no_meja'=>$request->noMeja,'id_produk'=>$request->idProduct])->exists()){
            $cart=Cart::where(['no_meja'=>$request->noMeja,'id_produk'=>$request->idProduct])->first();
            $cart->quantity += $request->quantity;
            $cart->save();
            return back()->withInput();
            
        }
        else{
            Cart::create(
                ['id_produk'=>$request->idProduct,
                'no_meja'=>$request->noMeja,
                'quantity'=>$request->quantity]);
                return back()->withInput();
                
        }

        
    }
    public function hapusCartItem($no_meja,$id_produk){
        Cart::where(['id_produk'=>$id_produk,'no_meja'=>$no_meja])->delete();
        return back();
    }
   public function print($no_meja){
       $items = Cart::where('no_meja',$no_meja)->get();
       $time = date('d-m-Y H:i:s');
       return view ('struk',compact('items','no_meja','time'));
       
   }
    public function pay(Request $request){
        //buat no_resi
        $no_meja = $request->no_meja;
        do{
            $no_resi = mt_rand( 1000000000, 9999999999 );}
            while ( DB::table( 'orders' )->where( 'no_resi', $no_resi )->exists() );
        
        //insert into orders table
        Order::create(
                ['no_meja'=>$request->no_meja,
                'total_harga'=>$request->totalharga,
                'no_resi'=>$no_resi,
                'id_user'=>Auth::user()->id]);

        //select semua item di cart yang nomor meja dan status antarnya cocok
        $items = Cart::where('no_meja',$request->no_meja)->get();
        
        //menyalin data dari table Cart ke OrderItem
        foreach($items as $item){
            $orderItem              = new OrderItem();
            $orderItem->no_resi    = $no_resi;
            $orderItem->id_produk   = $item->id_produk;
            $orderItem->quantity   = $item->quantity;
            $orderItem->id_user     = Auth::user()->id;
            $orderItem->save();

           
        }
        //Menghapus data dari cart yang telah dipindahkan ke orderitem
        Cart::where('no_meja',$request->no_meja)->delete();
        Alert::success('Suskes','Pesanan telah dibayar!');
        return back()->withInput();
        //return redirect()->route('struk', ['no_meja' => 1]);
        // return view('struk/');
    }
    
    
}