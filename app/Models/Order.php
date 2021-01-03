<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }
    use HasFactory;
    protected $fillable = [
        'user_id',
        'alamat',
        'total_barang',
        'total_bayar',
        'status',
       
    ];
protected $table="orders";
}
