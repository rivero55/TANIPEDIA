@extends('layouts.app')

@section('title', 'Buat Toko')

@section('content')
<div class="col-md-8 offset-md-2 mt-5">
    <h4 class="text-center" style="color:#2ECC71">Pembuatan Toko</h4>
    <form method="POST" action="{{ route('tambahtoko') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Nama toko</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="nama_toko"
                aria-describedby="emailHelp">
           
        </div>
        <div class="form-group">
            <label for="inlineFormInputGroup">Slogan Toko</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">Slogan toko</div>
                </div>
                <input type="text" class="form-control" id="inlineFormInputGroup" name="slogan_toko"
                    placeholder="">
            </div>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Deskripsi toko</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="deskripsi"></textarea>
        </div>
        <div class="form-group row">
            <div class="col-sm-4">
                <label for="exampleInputstock">Lokasi toko</label>
                <input type="text" class="form-control" id="exampleInputstock" name="lokasi_toko">
            </div>
        </div>
        <!-- <div class="form-group">
            <label for="exampleFormControlFile1">Example file input</label>
            <input type="file" name="gambar" class="form-control-file" id="exampleFormControlFile1">
        </div> -->
        <div class="d-flex justify-content-end">
        <button type="submit" class="btn btn-dark">submit</button>
        </div>

    </form>
</div>

@endsection