<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    // public function produk(){
    //     return $this->belongsTo('App\Models\Produk');
    // }
    protected $table="kategoris";

}
