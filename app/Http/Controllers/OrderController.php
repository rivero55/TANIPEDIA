<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Cart;
class OrderController extends Controller
{
    public function masukorder(Request $req){
        $data=$req->all();
        // dd($data);
        $user_id=auth()->user()->id;
        // $total_barang=auth()->user()->cart->sum('jumlah');
        // $total_harga=auth()->user()->cart->sum('total_harga');
        $order=new Order;
       
        $order->user_id = $user_id;
        $order->alamat = $data['alamat'];
        $order->total_barang = $data['total_barang'];
        $order->total_bayar= $data['total_bayar'];
        $order->status="Menunggu Konfirmasi";
        $order->save();
        $order_id = DB::getPdo()->lastInsertId();
        $produk_id= $req->produk_id;
        if(count($produk_id)>0){
            foreach($data['produk_id'] as $item => $value){
                $data2= array(
                    'order_id' => $order_id,
                    'produk_id' => $data['produk_id'][$item],
                    'user_id' => $data['user_id'][$item],
                    'toko_id' => $data['toko_id'][$item],
                    'pengiriman' => $data['pengiriman'][$item],
                    'nama_barang' => $data['nama_barang'][$item],
                    'kuantitas' => $data['kuantitas'][$item],
                    'satuan' => $data['satuan'][$item],
                    'harga' => $data['total_harga'][$item],
                );
                OrderDetail::create($data2);


            }
        }
    Cart::where('user_id',$user_id )->delete();
        
        // else{
        //     $orderdetail=new OrderDetail;
        //     $orderdetail->order_id = $order_id;
        //     $orderdetail->produk_id = $data['produk_id'];
        //     $orderdetail->pengiriman = $data['pengiriman'];
        //     $orderdetail->nama_barang= $data['nama_barang'];
        //     $orderdetail->kuantitas= $data['kuantitas'];
        //     $orderdetail->harga=$data['total_harga'];
        //     $orderdetail->save();
        //     }
        return redirect()->route('cart')->with('message', 'Berhasil Melakukan Transaksi Pembayaran');
    }
    public function userorder(){
        $user_id=auth()->user()->id;
        $order=OrderDetail::where('user_id',$user_id)->get();
       
        return view('layouts/order',compact('order'));
        
    }
    
    public function ordertoko(){
        $toko_id=auth()->user()->toko->id;
        $ordertoko=OrderDetail::where('toko_id',$toko_id)->get();

        return view('layouts/ordertoko',compact('ordertoko'));
        
    }
}
