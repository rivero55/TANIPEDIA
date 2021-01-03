<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Toko;
use App\Models\User;
use App\Models\Produk;
class TokoController extends Controller
{

    public function profiletokonolog($id_toko,$nama_toko){
        $toko=Toko::find($id_toko);
        $produk=Produk::where('id_toko',$id_toko)->get();
        return view ('layouts/profiletoko',compact('toko','produk'));
    }
    public function buattoko()
    {
        return view('layouts/buattoko');
    }
    
    public function tambahtoko(Request $req){
        $nama_toko=$req->nama_toko;
        $slogan_toko=$req->slogan_toko;
        $deskripsi=$req->deskripsi;
        $lokasi_toko=$req->lokasi_toko;
        $user_id=auth()->user()->id;
        $toko=new Toko();
        $update= User::find($user_id);
        $toko->nama_toko= $nama_toko;
        $toko->user_id= $user_id;
        $toko->slogan_toko= $slogan_toko;
        $toko->deskripsi= $deskripsi;
        $toko->lokasi_toko= $lokasi_toko;
        $toko->status= "buka";
        $update->role= 2;
        $update->nama_toko= $nama_toko;
        $toko->save();
        $update->save();
        return redirect(route('index'));
}

public function tambahproduk(){
    return view('layouts/addproduct');
    
}
}