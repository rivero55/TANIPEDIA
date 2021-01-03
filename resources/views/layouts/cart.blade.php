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

                <!-- Card -->
                <div class="mb-3">
                    <div class="pt-4 wish-list">
                        @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                        @endif
                        <h5 class="mb-4">Cart (<span>{{$cartcount}}</span> Produk)</h5>
                        <hr class="mb-2">
                        <!-- Card -->
                        @foreach($cart as $carts)

                        <div class="row mb-1">
                            <div class="col-md-5 col-lg-3 col-xl-3">
                                <h6><i class="fas fa-store-alt" style="color:#2ECC71"></i>
                                    {{$carts->produk->toko->nama_toko}}</h6>
                                <p class="mb-1 text-muted text-uppercase small">{{$carts->produk->toko->lokasi_toko}}
                                </p>
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
                                            <p class="mb-2 text-muted text-uppercase small">
                                                {{$carts->produk->harga}}{{$carts->produk->satuan}}</p>
                                            <!-- <p class="mb-3 text-muted text-uppercase small">Size: M</p -->
                                        </div>
                                        <div>
                                            <div class="def-number-input number-input safari_only mb-0 w-100">
                                                <label>Jumlah Pesanan</label>
                                                <input class="form-control-plaintext card-text font-weight-bold" min="0"
                                                    name="quantity" value="{{$carts->jumlah}}{{$carts->produk->satuan}}"
                                                    type="text" readonly>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>

                                            <a href="{{route('hapuscart', $carts->id)}}" type="button"
                                                class="card-link-secondary small text-uppercase mr-3"
                                                style="color:#4d77eb"><i class="fas fa-trash-alt mr-1"></i> Remove item
                                            </a>
                                        </div>
                                        <p class="mb-0">
                                            <label>Jumlah Pesanan</label>

                                            <span><strong>Rp.{{$carts->produk->harga*$carts->jumlah}}</strong></span>
                                        </p class="mb-0">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="mb-4">
                        @endforeach
                        <p class="text-primary mb-0"><i class="fas fa-info-circle mr-1"></i>Jangan tunda pembelian kamu,
                            menambah produk ke keranjang bukan berarti kamu sudah booking.</p>

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
                            <li
                                class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                Jumlah pcs/pack/kg
                                <span>{{auth()->user()->cart->sum('jumlah')}}</span>
                            </li>

                            <li
                                class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                Total Harga ({{$cartcount}} Produk)
                                <span>{{auth()->user()->cart->sum('total_harga')}}</span>
                            </li>

                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">

                                <span></span>
                            </li>
                            <li
                                class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                <div>
                                    <strong>Total Tagihan</strong>

                                </div>

                                <span><strong>Rp.{{auth()->user()->cart->sum('total_harga')}}</strong></span>

                            </li>
                        </ul>

                        <a type="button" class="btn btn-warning btn-block" style="color:white"
                            href="{{route('checkout')}}">go to checkout</button></a>

                    </div>
                </div>

                <!-- Card -->

                <!-- Card -->
                <div class="mb-3">
                    <div class="pt-4">



                        <div class="collapse" id="collapseExample">
                            <div class="mt-3">
                                <div class="md-form md-outline mb-0">
                                    <input type="text" id="discount-code" class="form-control font-weight-light"
                                        placeholder="Enter discount code">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Card -->

            </div>
            <!--Grid column-->

        </div>
        <!-- Grid row -->

    </section>
</div>
<!--Section: Block Content-->