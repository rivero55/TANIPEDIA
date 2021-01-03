@extends('layouts.app')

@section('title', 'home')

@section('content')
<div class="container pt-5">
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-1">
                    <img src="{{asset('img/toko.png')}}" class="rounded-circle" style="width:75px;height:75px">
                </div>
                <div class="col-md-10">
                    <h1 class="display-4">{{$toko->nama_toko}}</h1>
                    <p class="lead">{{$toko->slogan_toko}}</p>
                    <button type="button" class="btn btn-outline-light" data-toggle="modal"
                        data-target="#exampleModalCenter">
                        Info Toko
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle" style="color:black">Info toko
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body" style="color:black">

                                    <p>Lokasi Toko
                                    <div class=font-weight-bold>{{$toko->lokasi_toko}}</p>
                                    </div>
                                    <p>Deskripsi Toko
                                    <div class=font-weight-bold>{{$toko->deskripsi}}</p>
                                    </div>
                                    <p>Status Toko
                                    <div class=font-weight-bold>{{$toko->status}}</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<section>
    <div class="container pb-5">
        <div class="row">
            <div class="col-md-6">
                <h4>Produk toko ini</h4>
               

            </div>
            <div class="col-md-6 d-flex justify-content-end">
            @if (auth()->user())
            @if (auth()->user()->toko)
                @if(auth()->user()->toko->id == $toko->id)
                <a type="button" class="btn btn-warning" href="{{route('ordertoko')}}" style="color:white">cek orderan</a>
                <a type="button" class="btn btn-success" href="{{route('tambahproduk')}}" style="color:white">Tambah barang</a>
                @endif
                @endif
                @endif
            </div>
        </div>

        <div class="row pt-3">

            @foreach ($produk as $product)
            <div class="col-md-3 mt-3">
                <div class="card h-100" style="">
                    <a class="card-block stretched-link text-decoration-none"
                        href="{{route('produkdetail', $product->id)}}">
                        <img class="card-img-top" src="{{ asset('img/upload/'.$product->img_path) }}"
                            alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->nama_produk }}</h5>
                            <p class="card-text">{{ $product->deskripsi}}</p>
                        </div>
                        <div class="card-footer bg-transparent border-0">
                            <h4 class="card-text">Rp. {{ $product->harga}}{{ $product->satuan}}</h4>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>

</section>
@endsection