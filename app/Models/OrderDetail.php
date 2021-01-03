<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    public function produk(){
    return $this->belongsTo('App\Models\Produk', 'produk_id');
}
public function order(){
    return $this->belongsTo('App\Models\Order', 'order_id');
}
    protected $fillable = [
        'order_id',
        'produk_id',
        'user_id',
        'toko_id',
        'pengiriman',
        'nama_barang',
        'kuantitas',
        'satuan',
        'harga',
        'status',
    ];
    
protected $table="order_details";
}
