<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use App\Table;
use Illuminate\Http\Request;
use App\Transaction;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class OrderingListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $tables= Table::all();
        $espresso = Cart::where('espresso',0)
        ->leftJoin('products', 'carts.id_produk', '=', 'products.id')
        ->groupBy('no_meja')
        ->count();
       
        
        

        return view('orderinglist', compact('tables','espresso'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function finish($nomor_meja)
    {
        $carts = Cart::where('no_meja',$nomor_meja)->get();
        foreach($carts as $cart){
            $cart->status_antar = 1;
            $cart->save();
        }
        Alert::success('Pesanan telah selesai diantar!');
        return redirect('/orderinglist');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}