<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Produk;

class ProdukController extends Controller
{
    
    public function produkdetail($id){
        $produk= Produk::find($id);
        return view ('layouts/produkdetail', compact('produk'));
        
    }
    public function tambahprodukdb(Request $req){
        $id_toko=auth()->user()->toko->id;
        $nama_produk=$req->nama_produk;
        $deskripsi=$req->deskripsi;
        $kategori=$req->kategori;
        $harga=$req->harga;
        $stok=$req->stok;
        $satuan=$req->satuan;
        $gambar=time().'.'.$req->gambar->extension();
        $req->gambar->move(public_path('img/upload'), $gambar);
        $products=new Produk();
        $products->nama_produk= $nama_produk;
        $products->category_id= $kategori;
        $products->id_toko= $id_toko;
        $products->deskripsi= $deskripsi;
        $products->harga= $harga;
        $products->stok= $stok;
        $products->satuan= $satuan;
        $products->img_path= $gambar;
        $products->save();
        return redirect()->route('index')->with('message', 'Berhasil Melakukan tambah Produk');

    }
    public function updateproduk($id, Request $req){
        
        $update= Produk::find($id);
        $nama_produk=$req->nama_produk;
        $deskripsi=$req->deskripsi;
        $kategori=$req->kategori;
        $harga=$req->harga;
        $stok=$req->stok;
        $satuan=$req->satuan;

        $update->nama_produk=$nama_produk;
        $update->deskripsi=$deskripsi;
        $update->category_id=$kategori;
        $update->harga=$harga;
        $update->stok=$stok;
        $update->satuan=$satuan;
        if($req->gambar == null){
            $update->img_path=$req->gambarlama;
        }else{
            $gambar=time().'.'.$req->gambar->extension();
            $req->gambar->move(public_path('img/upload'), $gambar);
            $update->img_path=$gambar;
        }
        $update->save();
        return redirect()->route('produkdetail', [$id])->with('message', 'Berhasil Melakukan Update Produk');

    
    }

       
}
