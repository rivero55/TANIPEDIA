<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    public function produk(){
        return $this->belongsTo('App\Models\Produk','produk_id');
    }
    
    protected $fillable = [
        'user_id',
        'produk_id',
        'id_toko',
        'jumlah',
        'total_harga',
        'pengiriman',
        
    ];
protected $table="carts";
}
