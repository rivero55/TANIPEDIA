@extends('layouts.app')

@section('title', 'home')

@section('content')
<div class="container pt-5 mt-4">
    @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    @endif
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="img/1.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="img/2.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="img/3.jpg" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <section>
        <div class="container py-5">
            <div class="row">
                <div class="col-md">
                    <h4>Sayur Sayuran yang mungkin dibutuhkan</h4>
                </div>
            </div>

            <div class="row pt-3">


                @foreach ($sayuran as $sayurans)
                <div class="col-md-3 mt-3">
                    <div class="card h-100" style="">
                        <a class="card-block stretched-link text-decoration-none"
                            href="{{route('produkdetail', $sayurans->id)}}">
                            <img class="card-img-top" src="{{ asset('img/upload/'.$sayurans->img_path) }}"
                                alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">{{ $sayurans->nama_produk }}</h5>
                                <p class="card-text">{{ $sayurans->deskripsi}}</p>
                            </div>
                            <div class="card-footer bg-transparent border-0">
                                <h4 class="card-text">Rp. {{ $sayurans->harga}}{{ $sayurans->satuan}}</h4>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="row pt-5">
                <div class="col-md">
                    <h4>Buah</h4>
                </div>
            </div>
            <div class="row">
                @foreach ($buah as $buahs)
                <div class="col-md-3 mt-3">
                    <div class="card h-100" style="">
                        <a class="card-block stretched-link text-decoration-none"
                            href="{{route('produkdetail', $buahs->id)}}">
                            <img class="card-img-top" src="{{ asset('img/upload/'.$buahs->img_path) }}"
                                alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">{{ $buahs->nama_produk }}</h5>
                                <p class="card-text">{{ $buahs->deskripsi}}</p>
                            </div>
                            <div class="card-footer bg-transparent border-0">
                                <h4 class="card-text">Rp. {{ $buahs->harga}}{{ $buahs->satuan}}</h4>
                            </div>
                        </a>
                    </div>
                </div>

                @endforeach
            </div>

            <div class="row pt-5">
                <div class="col-md">
                    <h4>Daging</h4>
                </div>
            </div>
            <div class="row">
                @foreach ($daging as $dagings)
                <div class="col-md-3 mt-3">
                    <div class="card h-100" style="">
                        <a class="card-block stretched-link" href="{{route('produkdetail', $dagings->id)}}">
                            <img class="card-img-top" src="{{ asset('img/upload/'.$dagings->img_path) }}"
                                alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">{{ $dagings->nama_produk }}</h5>
                                <p class="card-text">{{ $dagings->deskripsi}}</p>
                            </div>
                            <div class="card-footer bg-transparent border-0">
                                <h4 class="card-text">Rp. {{ $dagings->harga}}{{ $dagings->satuan}}</h4>
                            </div>
                        </a>
                    </div>
                </div>

                @endforeach
            </div>

    </section>
    @endsection