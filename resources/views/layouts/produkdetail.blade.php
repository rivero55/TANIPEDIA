@extends('layouts.app')

@section('title', 'productdetail')
@push('css')
<style>
.vero{
    color:green;
}
</style>
@endpush
@section('content')
<div class="container">
    <div class="row pt-4">
        <div class="col-md-12 pt-5">
        @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                        @endif
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{ asset('img/upload/'.$produk->img_path)}}" class="img-fluid rounded"
                                alt="Responsive image">
                        </div>
                        <div class="col-md-4 ml-auto">
                            <div class="row h-100">

                                <div class="col-md-12 h-50">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">{{$produk->nama_produk}}</h5>
                                            <h6 class="card-subtitle mb-2 text-muted">{{$produk->deskripsi}}</h6>
                                            <form method="POST" action="{{route('masukkeranjang')}}">
                                                @csrf
                                                <div class="form-group row">
                                                    <label for="staticEmail"
                                                        class="col-sm-4 col-form-label">Harga</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" readonly
                                                            class="form-control-plaintext card-text font-weight-bold"
                                                            style="color:#E67E22" id="staticEmail"
                                                            value="Rp{{$produk->harga}}{{$produk->satuan}}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">

                                                    <label for="staticEmail"
                                                        class="col-sm-4 col-form-label">Jumlah</label>
                                                    <div class="col-sm-8">
                                                        <div class="input-group">
                                                            <input type="number" class="form-control"
                                                                id="inlineFormInputGroup" name="jumlah" placeholder=""required>
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">{{$produk->satuan}}</div>
                                                            </div>
                                                        </div>
                                                        <small id="emailHelp" class="form-text text-muted">Tersisa
                                                            {{$produk->stok}} </small>

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="staticEmail"
                                                        class="col-sm-4 col-form-label">Logistik</label>
                                                    <div class="col-sm-8">

                                                        <select id="inputState" class="form-control" name="pengiriman">
                                                            <option value="Kargo Express" selected>Kargo Express
                                                            </option>
                                                            <option value="Go-Box">GOBOX</option>
                                                        </select>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="col-md-12 py-2">
                                            @if (!auth()->user())
                                            <a type="submit" class="btn btn-success" style="color:white;"
                                                href="{{route('login')}}">Masukan Keranjang</a>
                                            @elseif (!auth()->user()->nama_toko)
                                            <button type="submit" class="btn btn-success ">Masukan Keranjang</button>
                                            @elseif (auth()->user()->toko->id == $produk->toko->id)
                                            <button type="button" class="btn btn-warning" data-toggle="modal"
                                                data-target="#exampleModalCenter">
                                                Update Produk
                                            </button>
                                            @else
                                            <button type="submit" class="btn btn-success">Masukan Keranjang</button>
                                            @endif
                                            <input type="hidden" value="{{$produk->id}}" name="produk_id">
                                            <input type="hidden" value="{{$produk->harga}}" name="harga">
                                        </div>
                                    </div>
                                </div>
                                </form>


                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                            <form method="POST" action="{{route('updateproduk', $produk->id)}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Nama Produk</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="nama_produk"
                aria-describedby="emailHelp">
         </div>
        <div class="form-group">
            <label for="inputState">kategori Produk</label>
                <select id="inputState" class="form-control" name="kategori">
                    
                    <option value="1">Sayur-sayuran</option>
                    <option value="2">Buah-Buahan</option>
                    <option value="3">Protein Hewani</option>
                </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Desckripsi Produk</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="deskripsi"></textarea>
        </div>
        <div class="form-group">
            <label for="inlineFormInputGroup">Harga</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">Rp.</div>
                </div>
                <input type="number" class="form-control" id="inlineFormInputGroup" name="harga"
                    placeholder="">
            </div>
        </div>
        <div class="form-row">
        <div class="form-group col-md-4">
                <label for="exampleInputstock">Stok Produk</label>
                <input type="number" class="form-control" id="exampleInputstock" name="stok">
        </div>
        <div class="form-group col-md-4">
      <label for="inputState">Satuan Produk</label>
      <select id="inputState" class="form-control" name="satuan">
        <option value="/kg" selected>/kg</option>
        <option value="/pcs">/pcs</option>
        <option value="/pack">/pack</option>
        <option value="/sisir">/sisir</option>
      </select>
    </div>
    </div>
        <div class="form-group">
        <div class="card" style="width: 18rem;">
  <img class="card-img-top" src="{{ asset('img/upload/'.$produk->img_path)}}" alt="Card image cap">

</div>
            <label for="exampleFormControlFile1">Foto Produk</label>
            <input type="file" name="gambar" class="form-control-file" id="exampleFormControlFile1">
            <input type="hidden" name="gambarlama" value="{{$produk->img_path}}">
        </div>
        
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-dark">Simpan</button>
    </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 pt-2">
                            <div class="card">
                                <div class="card-body">
                                    <div class=" d-flex justify-content-start">
                                        Produk ini di kategori : <div class="font-weight-bold">
                                            {{$produk->kategori->name}}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 pt-4">
            <div class="card">
                <div class="card-body">
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-2">

                            <img src="{{asset('img/toko.png')}}" class="rounded-circle" style="width:75px;height:75px">

                            <p>{{$produk->toko->nama_toko}}</p>

                            <p style="color:#2ECC71">{{$produk->toko->status}}</p>
                            <a class="btn btn-outline-warning" style="color:#FA591D"
                                href="{{route('profiletokonolog',[$produk->toko->id, $produk->toko->nama_toko])}}">Profile
                                Toko</a>
                        </div>
                        <div class="col-md-6">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection