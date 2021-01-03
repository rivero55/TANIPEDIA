@extends('layouts.app')

@section('title', 'addproduct')

@section('content')
<div class="col-md-8 offset-md-2 mt-5">
    <h4 class="text-center">Tambah Produk</h4>
    <form method="POST" action="{{route('tambahprodukdb')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Nama Produk</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="nama_produk"
                aria-describedby="emailHelp">
         </div>
        <div class="form-group">
            <label for="inputState">kategori Produk</label>
                <select id="inputState" class="form-control" name="kategori">
                    <option selected>--Pilih Kategori Produk--</option>
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
        <div class="form-group col-md-2">
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
            <label for="exampleFormControlFile1">Foto Produk</label>
            <input type="file" name="gambar" class="form-control-file" id="exampleFormControlFile1">
        </div>
        <button type="submit" class="btn btn-dark">submit</button>
    </form>
</div>

@endsection