<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/ex.css') }}">
    <script src="https://kit.fontawesome.com/e08391607d.js" crossorigin="anonymous"></script>
    <title>@yield('title')</title>
    @stack('css')
    <style>
    .btn-success {
        background-color: #2ECC71;
    }

    .btn-outline-success {
        border-color: #2ECC71;

    }

    .css-1v8b07p {
        width: 1.2px;
        min-width: 1.2px;
        height: 24px;
        background: #e0e0e0;
        margin: 0 5px 0 5px;

    }

    a,
    a:hover,
    a:visited,
    a:focus {
        text-decoration: none;
    }
    a:link{
        color: #6c757d;
    }
    a:visited {
  color:#6c757d;
}
    a:hover{
        color:#2ECC71;
    }

    .btn-group .btn:hover {
        background-color: #ededed
    }

    .btn-group .btn:active {
        background-color: #ededed;
        box-shadow: 0 5px #666;
        transform: translateY(4px);
    }
    .h4{
        color:#2ECC71;
    }
    .jumbotron{
  background: 
linear-gradient(
  rgba(0, 0, 250, 0.25), 
  rgba(125, 250, 250, 0.45)
);
background-repeat: no-repeat;
background-attachment: fixed;
color:white !important;

}
    </style>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    


    <!-- Fonts -->
    <!-- <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> -->

    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top shadow">
            <a class="navbar-brand ml-2" style="color:green" href="{{ url('/') }}"><img class="img-fluid" style=""src="{{asset('img/tanipediatext2.png')}}"></a>

            <!-- <a class="navbar-brand" href="{{ url('/') }}"> -->
            <!-- {{ config('app.name', 'Laravel') }} -->
            <!-- </a> -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Kategori<span class="sr-only">(current)</span></a>
                    </li>
                    <li>
                        <div class="input-group">
                            <input type="text" class="form-control" id="search" placeholder="Search">
                            <div class="input-group-append">
                                <button class="btn btn-secondary" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </li>
                </ul>


                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-success mr-2 rounded-pill" href="{{ route('register') }}"
                            style="color:#2ECC71">{{ __('Register') }}</a>
                    </li>
                    @endif

                    @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link btn btn-success mr-2 rounded-pill" href="{{ route('login') }}"
                            style="color:white">{{ __('Login') }}</a>
                    </li>
                    @endif


                    @else

                    </li>
                    <!-- <li class="btn" ><i class="fa fa-shopping-basket" aria-hidden="true"></i></li> -->
                    <div class="btn-group">
                    <li class="btn"><a href="{{route('userorder')}}"><i class="fas fa-envelope" style="color:black"></i></a></li>
                    <li class="btn"><a href="{{route('cart')}}"><i class="fa fa-shopping-basket" style="color:black"></i></a>
                    </li>
                    <div class="css-1v8b07p mt-2"> </div>
                    @if (auth()->user()->role == 1)
                    <li class="btn"><i class="fas fa-store mr-1"></i><a href="{{ route('buattoko') }}">Buat Toko</a></li>
                    @else

                    <li class="btn"><i class="fas fa-store mr-1"></i><a href="{{ route('profiletokonolog',[Auth::user()->toko->id, Auth::user()->toko->nama_toko]) }}">{{ Auth::user()->nama_toko     }}</a></li>

                    @endif
                    </div>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('profileuser', [Auth::user()->id, Auth::user()->name])}}">Profile</a>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                </ul>
            </div>
    </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
    <hr />
    <footer class="bg-white" id="lokasi">
        <div class="container pt-2">
          
                

            <div class="row py-3">
                <div class="col-md-3">
                <img class=img-fluid src="{{asset('img/tanipedia.png')}}">
                </div>
                <div class="col-md-3">

                    <h5>Kantor Tanipedia</h3>
                    <p> Jl. Telekomunikasi Jl. Terusan Buah Batu, Sukapura, Kec. Dayeuhkolot, Kota Bandung, Jawa Barat 40257</p>
                    <p><i class="fas fa-phone-square-alt"></i>+62028323232</p>
                    <p><i class="fas fa-envelope"></i>tanipedia@gmail.com</p>
                    <a href="www.facebook.com" style="color:black"><i class="fab fa-facebook"></i></a>  
                    <a href="www.twitter.com" style="color:black"><i class="fab fa-twitter"></i></a>  
                    <a href="www.google.com" style="color:black"><i class="fab fa-google"></i></a>  
                    <a href="www.instagram.com" style="color:black"><i class="fab fa-instagram"></i></a>  
                    <a href="www.youtube.com" style="color:black"><i class="fab fa-youtube"></i></a>  
                </div>
                <div class="col-md-6">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3025.306387423315!2d-74.04668908489816!3d40.68924937933439!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25090129c363d%3A0x40c6a5770d25022b!2sPatung%20Liberty!5e0!3m2!1sid!2sid!4v1601860149325!5m2!1sid!2sid"
                            width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""
                            aria-hidden="false" tabindex="0"></iframe>
                    </div>
                </div>
            </div>

        </div>
        <!-- <div class="container-fluid">
        <div class="row bg-dark text-white">
                <div class="col text-center">
                    <p>&copy; Copyright 2020 by Tanipedia</p>
                </div>
            </div>
                </div> -->

    </footer>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
</body>

</html>