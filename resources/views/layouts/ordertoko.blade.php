@extends('layouts.app')

@section('title', 'orderdetail')

@section('content')

<!-- <div class="row pt-2">
    <div class="col d-flex align-items-center justify-content-center mt-4">
        <p>There is no data</p>
    </div>
</div> -->
<!-- <div class="row">
    <div class="col d-flex justify-content-center">
        <a type="button" class="btn btn-dark mb-3" href="">add product</a>
    </div>
</div> -->
<div class="container pt-5  ">
<div class="row pt-4">
    <div class="col">
        <h4 class="text-center">List Penjualan</h4>
    </div>
</div>
<div class="row pt-2">
    <div class="col d-flex align-items-center justify-content-center mt-4">
    </div>
</div>
<div class="row">
<div class="col">
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Nama Customer</th>
                
                <th>Alamat</th>
                <th>Nama Produk</th>
                <th>Total Harga</th>
                <th>Jumlah barang</th>
                <th>Status</th>
                <th>Aksi</th>

            </tr>
        </thead>
        @foreach ($ordertoko as $ordertokos)
        <tr>
            <td>{{ $loop->iteration}}</td>
            <td>{{ $ordertokos->order->user->name}}</td>
           
            <td>{{ $ordertokos->order->alamat }}</td>
            <td>{{ $ordertokos->produk->nama_produk }}</td>
            <td>Rp. {{ $ordertokos->harga }}</td>
            <td>{{ $ordertokos->kuantitas }}{{ $ordertokos->satuan}}</td>
            <td>{{ $ordertokos->order->status }}</td>
            <td><a href="" class="btn btn-success" type="button" style="color:white">Konfirmasi</a>
            <a href="" class="btn btn-danger" type="button" style="color:white">Tolak Pesanan</a>
        </td>
       
        </tr>
        @endforeach
    </table>
    </div>
</div>
</div>
@endsection