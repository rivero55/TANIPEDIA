<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Toko extends Model
{
    public function produk(){
        return $this->hasMany('App\Models\Produk', 'id_toko');
    }

    use HasFactory;
    protected $fillable = [
        'nama_toko',
        'user_id',  
        'slogan_toko',
        'deskripsi',
        'lokasi_toko',
        'status',
    ];
    protected $table="tokos";
}
