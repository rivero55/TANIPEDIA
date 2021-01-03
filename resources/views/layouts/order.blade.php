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
        <h4 class="text-center">List Pembelian Produk</h4>
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
                <th>Order Id</th>
                <th>Nama Toko</th>
                <th>Nama Produk</th>
                <th>Jumlah Barang</th>
                <th>Tanggal order</th>
                <th>Total harga</th>
                <th>Status</th>
            </tr>
        </thead>
        @foreach ($order as $orders)
        <tr>
            <td>{{ $loop->iteration}}</td>
            <td>{{ $orders->order_id}}</td>
            <td>{{ $orders->produk->toko->nama_toko}}</td>
            <td>{{ $orders->nama_barang }}</td>
            <td>{{ $orders->kuantitas }}{{ $orders->satuan }}</td>
            <td>{{ $orders->created_at}}</td>
            <td>Rp. {{ $orders->harga}}</td>
            <td>{{ $orders->order->status }}</td>
       
        </tr>
        @endforeach
    </table>
    </div>
</div>
</div>
@endsection