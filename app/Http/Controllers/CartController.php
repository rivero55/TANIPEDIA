<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use App\Models\Produk;


use Illuminate\Http\Request;

class CartController extends Controller
{
    public function carthome(){
        $user_id=auth()->user()->id;
        $cart=Cart::where('user_id',$user_id )->get();
        $cartcount=$cart->count();
        return view('layouts/cart',compact('cart','cartcount'));
        
    }
    
    public function masukkeranjang(Request $req){
        $user_id=auth()->user()->id;
        $produk_id=$req->produk_id;
        $jumlah=$req->jumlah;
        $pengiriman=$req->pengiriman;
        $harga=$req->harga;
        $cart=new Cart();
        $cart->user_id= $user_id;
        $cart->produk_id= $produk_id;
        $cart->jumlah= $jumlah;
        $cart->pengiriman= $pengiriman;
        $cart->total_harga= $harga*$jumlah;
        $cart->save();
        return redirect(route('cart'));
    }
public function hapuscart($id){
    $user_id=auth()->user()->id;
    $cart=Cart::where('user_id',$user_id )->get();
    $cartcount=$cart->count();
    Cart::find($id)->delete();
    return redirect()->route('cart')->with( ['cartcount' => $cartcount] );

    
}public function checkout(){
    $user_id=auth()->user()->id;
        $cart=Cart::where('user_id',$user_id )->get();
        $cartcount=$cart->count();
        return view('layouts/checkout',compact('cart','cartcount'));
    
}

}
