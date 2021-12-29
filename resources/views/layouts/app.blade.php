<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" type="image/png" href="{{ url('images/favicon.png')}}">
    <title> {{ config('app.name') . ' - ' }} @yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
               <div >
                   <a href="{{url('')}}" style="text-decoration:none;"><img src="{{ url('images/logo-ATP.png')}}" height="75" ></a>
               </div>
                
        
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            @if(Auth::user()->roles == 'admin')
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ url('dashboard') }}">
                                        Dashboard
                                    </a>
                                    <a class="dropdown-item" href="{{ url('account/me') }}">
                                        Profil
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @else
                            <li class="nav-item">
                                <?php
                                $pesanan_utama = \App\Models\pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
                                if (!empty($pesanan_utama)) 
                                {
                                    $notif = \App\Models\detailpesanan::where('pesanan_id', $pesanan_utama->id)->count();
                                }
                                
                                ?>
                                    <a class="nav-link" href="{{ url('check-out') }}">
                                        <i class="fa fa-shopping-cart"></i>
                                        @if(!empty($notif))
                                        <span class="badge badge-danger">{{ $notif }}</span>
                                        @endif 
                                    </a>
                            </li>                            
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ url('history') }}">
                                        Riwayat Pemesanan
                                    </a>
                                    <a class="dropdown-item" href="{{ url('profile') }}">
                                        Profil
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @endif
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="pt-4">
            @yield('content')
            <hr>
        </main>
        <div class=" bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 justify-content-center" >
                        <h2><strong>Logo ATP</strong></h2>
                        <a href="{{url('')}}" style="text-decoration:none;">
                        <img src="{{ url('images/logo-ATP.png')}}" width="100%" >
                        </a>
                    </div>
                    <div class="col-md-5">
                        <h2><strong>Sekilas ATP</strong></h2>
                        <p align="justify">Agro technopark Universitas Brawijaya berdiri tahun 2015 bergerak pada bidang layanan jasa dan barang dalam rangka meningkatkan kemampuan diseminasi teknologi Universitas Brawijaya secara komersial berbasis agro-komplek berwawasan bioindustri. Agro-technopark bertujuan melayani kebutuhan teknologi bagi masyarakat luas baik kalangan akademis, praktisi dan pelaku usaha. Bentuk layanan jasa antara lain fasilitas penelitian danlaboratoriumpemuliaantanaman, laboratorium lapang, pelatihan penerapan teknologi dan jasa konsultansi. Produk barang dalam bentuk komoditas pertanian, peternakan, perikanan, panduan teknologi dan benih – bibit unggul bersertifikat.</p>
                    </div>
                    <div class="col-md-4 justify-content-center text-center">
                        <div class="row m-0">
                            <div class="col">
                                <a href="https://www.instagram.com/atp_ub/?hl=en" target="blank" class=""><span><i class="fab fa-instagram fa-4x"></i></span></a>
                                <a href="https://www.instagram.com/atp_ub/?hl=en" target="blank" style="text-decoration:none;"><img src="{{ url('images/ig_text.png')}}" height="75" class="mb-4"></a>
                            </div>
                        </div>
                        <div class="row m-0">
                            <div class="col">                           
                                <a href="https://wa.me/message/4K3P23IHEDYHC1" target="blank" class=""><span><i class="fab fa-whatsapp fa-4x"></i></span></a>
                                <a href="https://wa.me/message/4K3P23IHEDYHC1" target="blank" style="text-decoration:none;"><img src="{{ url('images/wa_text.png')}}" height="75" class="mb-4"></a>                                
                            </div>
                        </div>
                        <div class="row m-0">
                            <div class="col">
                                <a href="http://atp.ub.ac.id/" target="blank" class=""><span><i class="fas fa-globe fa-4x"></i></span></a>                                
                                <a href="http://atp.ub.ac.id/" target="blank" style="text-decoration:none;"><img src="{{ url('images/logo.png')}}" height="60" class="mb-4 ml-2"></a>                                

                            </div>                            
                        </div>                                                                    
                    </div>
                </div>                
            </div>
        </div>
    </div>
        <footer class="bg-dark py-3">
        <div class="container">
            <p class="text-center m-0">
                <a href="{{url('')}}" style="text-decoration:none;" class="text-white">Copyright &copy ATP {{date('Y')}}</a>
            </p>                    
        </div>
        </footer>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
     @include('sweet::alert')
</body>
</html>
