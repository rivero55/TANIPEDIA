@extends('layouts.app')

@section('title', 'home')

@section('content')
<!--Section: Block Content-->
<div class="container pt-5">
    <section>

        <!--Grid row-->
        <div class="row pt-4">

            <!--Grid column-->
            <div class="col-lg-8">
                <form method="POST" action="{{route('masukorder')}}">
                @csrf
                    <!-- Card -->
                    <div class="mb-3">
                        <div class="pt-4 wish-list">
                            <h5 class="mb-4">Checkout</h5>
                            <hr />
                            <div class="form-group">
                                <label for="alamat">Alamat </label>
                                <input type="text" class="form-control" id="alamat" name="alamat"
                                    placeholder="Masukan Alamat Rumahmu" required>
                            </div>

                            <input type="hidden" name="total_barang" value="{{auth()->user()->cart->sum('jumlah')}}">
                            <input type="hidden" name="total_bayar" value="{{auth()->user()->cart->sum('total_harga')}}">

                            <hr class="mb-4">
                            <h6 class="mb-4">Total Pesanan (<span>{{$cartcount}}</span> Produk)</h6>
                            <!-- Card -->
                            @foreach($cart as $carts)
                            <input type="hidden" name="produk_id[]" value="{{$carts->produk->id}}">
                            <input type="hidden" name="user_id[]" value="{{$carts->user_id}}">
                            <input type="hidden" name="toko_id[]" value="{{$carts->produk->toko->id}}">
                            <input type="hidden" name="pengiriman[]" value="{{$carts->pengiriman}}">
                            <input type="hidden" name="nama_barang[]" value="{{$carts->produk->nama_produk}}">
                            <input type="hidden" name="kuantitas[]" value="{{$carts->jumlah}}">
                            <input type="hidden" name="total_harga[]" value="{{$carts->total_harga}}">
                            <input type="hidden" name="satuan[]" value="{{$carts->produk->satuan}}">
                     
                            <div class="row mb-1">
                            <div class="col-md-5 col-lg-3 col-xl-3">
                            <h6><i class="fas fa-store-alt" style="color:#2ECC71"></i> {{$carts->produk->toko->nama_toko}}</h6>
                            <p class="mb-1 text-muted text-uppercase small">{{$carts->produk->toko->lokasi_toko}}</p>
                        </div>
                    </div>
                            <div class="row mb-4">
                                <div class="col-md-5 col-lg-3 col-xl-3">
                                    <div class="view zoom overlay z-depth-1 rounded mb-3 mb-md-0">
                                        <img class="img-fluid w-100"
                                            src="{{ asset('img/upload/'.$carts->produk->img_path) }}" alt="Sample">

                                        <a href="#!">

                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-7 col-lg-9 col-xl-9">
                                    <div>
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <h5>{{$carts->produk->nama_produk}}</h5>


                                                <p class="mb-3 text-muted text-uppercase small">
                                                    {{$carts->produk->deskripsi}}</p>
                                                <p class="mb-2 text-muted text-uppercase small">{{$carts->produk->harga}}{{$carts->produk->satuan}}</p>
                                                <!-- <p class="mb-3 text-muted text-uppercase small">Size: M</p -->
                                            </div>
                                            <div>
                                                <div class="def-number-input number-input safari_only mb-0 w-100">
                                                    <label>Jumlah Pesanan: </label>
                                                        <span><strong>{{$carts->jumlah}}{{$carts->produk->satuan}}</strong></span>

                                                </div>
                                                <label>Pengiriman: </label>

                                                <span><strong>{{$carts->pengiriman}}</strong></span>

                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                        <span><strong></strong></span>

                                            <p class="mb-0">

                                                <span><strong>Rp.{{$carts->produk->harga*$carts->jumlah}}</strong></span>
                                            </p class="mb-0">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="mb-4">
                            @endforeach
                

            </div>
        </div>

        <!-- Card -->

        <!-- Card -->
        <div class="mb-3">
            <div class="pt-4">

                <h5 class="mb-4">Expected shipping delivery</h5>

                <p class="mb-0"> Thu., 12.03. - Mon., 16.03.</p>
            </div>
        </div>
        <!-- Card -->

        <!-- Card -->
        <div class="mb-3">
            <div class="pt-4">

                <h5 class="mb-4">We accept</h5>

                <img class="mr-2" width="45px"
                    src="https://mdbootstrap.com/wp-content/plugins/woocommerce-gateway-stripe/assets/images/visa.svg"
                    alt="Visa">
                <img class="mr-2" width="45px"
                    src="https://mdbootstrap.com/wp-content/plugins/woocommerce-gateway-stripe/assets/images/amex.svg"
                    alt="American Express">
                <img class="mr-2" width="45px"
                    src="https://mdbootstrap.com/wp-content/plugins/woocommerce-gateway-stripe/assets/images/mastercard.svg"
                    alt="Mastercard">
                <img class="mr-2" width="45px"
                    src="https://mdbootstrap.com/wp-content/plugins/woocommerce/includes/gateways/paypal/assets/images/paypal.png"
                    alt="PayPal acceptance mark">
            </div>
        </div>
        <!-- Card -->

</div>
<!--Grid column-->

<!--Grid column-->
<div class="col-lg-4">

    <!-- Card -->

    <div class="mb-3">
        <div class="pt-4">

            <h5 class="mb-3">Ringkasan belanja</h5>

            <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                    Jumlah pcs/pack/kg
                    <span>{{auth()->user()->cart->sum('jumlah')}}</span>
                </li>

                <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                    Total Harga ({{$cartcount}} Produk)
                    <span>{{auth()->user()->cart->sum('total_harga')}}</span>
                </li>

                <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                    Pengiriman
                    <span>Gratis</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                    <div>
                        <strong>Total Tagihan</strong>

                    </div>

                    <span><strong>Rp.{{auth()->user()->cart->sum('total_harga')}}</strong></span>

                </li>
            </ul>

            <button type="submit" class="btn btn-warning btn-block" style="color:white">Bayar</button>
            </form>
        </div>
    </div>

    <!-- Card -->

    <!-- Card -->
    <div class="mb-3">

    </div>
    <!-- Card -->

</div>
<!--Grid column-->

</div>
<!-- Grid row -->

</section>
</div>
<!--Section: Block Content-->