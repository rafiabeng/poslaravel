<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index($no_meja){
        $products = Product::all();
        $cartItems = Cart::where('no_meja',$no_meja)
                    ->leftJoin('products', 'carts.id_produk', '=', 'products.id')
                    ->get();

                   

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
}