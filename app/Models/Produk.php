<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    public function kategori(){
        return $this->belongsTo('App\Models\Kategori','category_id');
    }
    public function toko(){
        return $this->belongsTo('App\Models\Toko','id_toko');
    }
   
    protected $fillable = [
        'nama_produk',
        'category_id',
        'id_toko',
        'deskripsi',
        'harga',
        'stok',
        'satuan',
        'img_path',
    ];
protected $table="produks";
}
