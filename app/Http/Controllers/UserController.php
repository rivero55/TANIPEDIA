<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function profileuser($id_user,$nama_user)
    {
        $user_id=auth()->user()->id;
        $user=User::find($user_id);
        return view('layouts/profileuser',compact('user'));
    }

    public function updateprofile(Request $req){
    $id=auth()->user()->id;
    $name=auth()->user()->name;
        $name=$req->name;
       $nohp=$req->nohp;
       $tanggal_lahir=$req->tanggal_lahir;
       $stock=$req->stock;
       
        $update= User::find($id);
        $update->name= $name;
        $update->nohp= $nohp;
        $update->tanggal_lahir= $tanggal_lahir;
        $update->save();

       
        return redirect()->route('profileuser',['$id','$name'])->with('message', 'Berhasil Melakukan Update profile');

    }
}
