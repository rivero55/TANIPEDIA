<?php

namespace App\Http\Controllers;
use App\Models\Produk;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function indexhome()
    {
        $sayuran=Produk::where('category_id', 1)->get();
        $buah=Produk::where('category_id', 2)->get();
        $daging=Produk::where('category_id', 3)->get();
        return view('layouts/index',compact('sayuran','buah','daging'));
    }
}
