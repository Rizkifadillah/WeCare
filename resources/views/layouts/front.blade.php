<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $setting->company_name}} | @yield('title')</title>
    
    <link rel="icon" href="{{ asset('img/favicon.png')}}" type="image/*">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('assets/backend/plugins/fontawesome-free/css/all.min.css')}}">

      <link rel="stylesheet" href="{{ asset('assets/backend/dist/css/adminlte.min.css')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    @stack('css_vendor')
   
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            font-size: 1rem;
        }

        /* Utilities */
        .bg-white-50 {
            background: rgba(255, 255, 255, .5);
            transition: .5s;
        }
        .bg-dark-50 {
            background: rgba(0, 0, 0, .5);
        }
        .bg-light {
            background: #f4f6f9;
        }
        .text-white-80 {
            color: rgba(255, 255, 255, .8);
        }
        .text-lg {
            font-size: 1.25rem;
        }
        a.text-white-80:hover {
            color: rgba(255, 255, 255, .5);
        }

        /* Header & Navbar */
        .header {
            font-size: 14px;
        }
        .navbar-brand img {
            width: 170px;
            position: absolute;
            top: 4px;
        }
        #navbar1 .nav-link {
            padding: .35rem 1.25rem;
            border-radius: 25px;
            color: #333333;
            transition: .3s;
        }
        #navbar1 .nav-link:hover,
        #navbar1 .nav-link:focus,
        #navbar1 .nav-link.active {
            background: var(--primary);
            color: var(--white);
        }
        #navbar1 .dropdown-menu {
            padding: 0;
            border-radius: 0;
            border: 0;
            margin-top: 8px;
        }
        #navbar1 .dropdown-item {
            transition: .3s;
        }
        #navbar1 .dropdown-item:hover,
        #navbar1 .dropdown-item:focus {
            background: var(--primary);
            color: var(--white);
        }
        .navbar-toggler {
            border: 0;
            background: transparent !important;
        }
        .navbar-toggler:focus {
            outline: 0;
            background: transparent !important;
        }
        .navbar-toggler .icon-bar {
            background-color: rgba(0, 0, 0, .7);
            transform: rotate(0deg) translate(0px, 0px);
            transition: ease all .2s;
            display: block;
            width: 22px;
            height: 2px;
            border-radius: 1px;
        }
        .navbar-toggler .icon-bar+.icon-bar {
            margin-top: 4px;
        }
        .icon-bar:nth-child(2) {
            width: 16px;
            transition: ease all .2s;
        }
        .navbar-toggler:hover>.icon-bar:nth-child(2) {
            width: 22px;
            transition: ease all .2s;
        }
        .navbar-toggler:active>.icon-bar:nth-child(2) {
            width: 22px;
            transition: ease all .2s;
        }
        .navbar-toggler:not(.collapsed):not(.first-load) .icon-bar:nth-child(1) {
            transform: rotate(45deg) translate(5px, 4px);
            transition: ease all .2s;
        }
        .navbar-toggler:not(.collapsed):not(.first-load) .icon-bar:nth-child(2) {
            opacity: 0;
            transition: ease all .2s;
        }
        .navbar-toggler:not(.collapsed):not(.first-load) .icon-bar:nth-child(3) {
            transform: rotate(-45deg) translate(4px, -4px);
            transition: ease all .2s;
        }

        @media (max-width: 992px) {
            .header .social {
                text-align: center;
                margin-bottom: 1rem;
            }
            .header .office-info {
                margin-bottom: 1rem;
            }
            .header .office-info a {
                white-space: nowrap;
            }
            .header .action {
                text-align: center;
            }
        }

        @media (max-width: 768px) {
            #navbar1 .nav-link:first-child:not(.dropdown-toggle) {
                display: none;
            }
        }

        @media (max-width: 575.98px) {
            #navbar1 .nav-link {
                border-radius: 0;
            }
            #navbar1 .nav-link:first-child:not(.dropdown-toggle) {
                display: block;
            }
            .navbar-collapse {
                margin-top: 1rem;
                transition: .3s;
            }
            .navbar-brand {
                padding-top: 1.25rem;
                padding-bottom: 1.25rem;
            }
            .navbar-brand img {
                top: 7.5px;
            }
        }

        /* Banner */
        .banner {
            min-height: 280px;
            display: flex;
            align-items: flex-end;
            padding-bottom: 10px;
            position: relative;
        }
        .banner.bg-wecare2 {
            background-image: url('{{ asset("/img/bgcharity2.png") }}');
            background-size: contain;
            background-repeat: no-repeat;
            background-position: bottom;
        }
        .banner.bg-wecare2 h2 {
            text-shadow: 1px 1px 3px rgba(0, 0, 0, .8);
        }

        @media (max-width: 575.98px) {
            .banner.bg-wecare2 {
                background-size: cover;
                background-position: left;
            }
        }
    </style>

    @stack('css')
  </head>
  <body class="bg-light">
    {{-- header --}}
    <div class="header bg-primary text-white py-2">
        <div class="container">
            <div class="row d-flex align-items-center">
                {{-- sosial --}}
                {{-- <h1>WeCare</h1> --}}
                <div class="col-lg-3 social">
                    <a href="{{ $setting->instagram_link }}" target="_blank" class="text-white ml-3"><i class="fab fa-instagram"></i></a>
                    <a href="{{ $setting->twitter_link }}" target="_blank" class="text-white ml-3"><i class="fab fa-twitter"></i></a>
                    <a href="{{ $setting->google_plus_link }}" target="_blank" class="text-white ml-3"><i class="fab fa-google-plus-g"></i></a>
                    <a href="{{ $setting->fanpage_link }}" target="_blank" class="text-white ml-3"><i class="fab fa-facebook-f"></i></a>
                </div>
                <div class="col-lg-7 office-info text-center">
                    <a href="" class="text-white text-decoration-none">
                        <i class="fas fa-phone-alt"></i>
                        <span class="ml-1"> {{ $setting->phone }}</span>
                    </a>
                    <a href="" class="ml-3 text-white text-decoration-none">
                        <i class="far fa-clock"></i>
                        <span class="ml-1"> {{$setting->phone_hours}} </span>
                    </a>
                    <a href="" class="ml-3 text-white text-decoration-none">
                        <i class="fas fa-envelope"></i>
                        <span class="ml-1"> {{$setting->email}}</span>
                    </a>
                </div>
                <div class="col-lg-2 action" style="white-space: nowrap;">
                    <a href="{{ url('/donation')}}" class="btn btn-sm btn-light py-0 rounded-10">
                        Donasi
                    </a>
                    <a href="{{ url('/campaign')}}" class="btn btn-sm btn-light py-0 rounded-10">
                        Galang Dana
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- navbar --}}
    <nav class="navbar navbar-expand-sm sticky-top navbar-light bg-white border-bottom" style="top: -1px;">
        <div class="container">
            <a class="navbar-brand mt-2" href="{{ url('/')}}">
                <img src="{{ asset('img/favicon.png')}}" alt="" style="width: 50px;">
            </a>
            <h3 class="ml-5 mt-2">We<strong class="text-primary">Care</strong></h3>

            <button class="navbar-toggler first-load" type="button" data-toggle="collapse" data-target="#navbar1" aria-controls="navbar1" aria-expanded="false" aria-label="Toggle navigation">
                <span class="icon-bar top-bar"></span>
                <span class="icon-bar middle-bar"></span>
                <span class="icon-bar buttom-bar"></span>
                <span class="sr-only">Toggle Navigation</span>

            </button>

            <div class="collapse navbar-collapse my-2 my-lg-0" id="navbar1">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link @if(request()->is('/')) active @endif" href="{{ url('/')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if(request()->is('contact')) active @endif" href="{{ url('/contact')}}">Kontak</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if(request()->is('about')) active @endif" href="{{ url('/about')}}">Tentang Kami</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                        Bantuan
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('login')}}">Login</a>
                        {{-- <div class="dropdown-divider"></div> --}}
                        <a class="dropdown-item" href="{{ route('register')}}">Register</a>
                        </div>
                    </li>
                
                </ul>
                
            </div>
        </div>
    </nav>

    {{-- content --}}
    @yield('content')

    {{-- footer --}}
    
    <div class="footer bg-dark">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-3 text-white-80 ">
                    <div class="footer-logo mb-4 d-flex">
                        <img src="{{ asset('img/favicon.png')}}" alt="" style="width: 50px;">
                        <h3 class="mt-2 ml-2">We<strong class="text-primary">Care</strong></h3>
                    </div>
                    <p>
                        {{ $setting->address}} <br>
                        {{$setting->city}} ,{{ $setting->province}}
                    </p>
                    <p class="mb-1"><i class="fas fa-phone-alt mr-2"></i> {{ $setting->phone}}</p>
                    <p class="mb-1"><i class="fas fa-envelope mr-2"></i> {{ $setting->email}}</p>
                    <p class="mb-1"><i class="fas fa-globe mr-2"></i> {{ $setting->company_name}}</p>

                </div>
                <div class="col-lg-3 text-white-80 mt-2">
                    <h5 class="mb-lg-4 mb-2">Mari Berbagi</h5>
                    <p class="mb-lg-3 mb-1">
                        <a href="{{ url('/campaign')}}" class="text-white-80 text-decoration-none">Galang Dana</a> <br>
                        <small class="text-muted">{{ tanggal_indonesia(now())}}</small>
                    </p>
                    <p class="mb-lg-3 mb-1">
                        <a href="{{ url('/donation')}}" class="text-white-80 text-decoration-none">Donasi</a> <br>
                        <small class="text-muted">{{ tanggal_indonesia(now())}}</small>
                    </p>
                </div>
                <div class="col-lg-3 text-white-80 mt-2">
                    <h5 class="mb-lg-4 mb-2">Bantuan</h5>
                    <p class="mb-lg-3 mb-1"><a href="{{ url('/about')}}" class="text-white-80 text-decoration-none">Tentang Kami</a></p>
                    <p class="mb-lg-3 mb-1"><a href="#" class="text-white-80 text-decoration-none">Syarat dan Ketentuan</a></p>
                    <p class="mb-lg-3 mb-1"><a href="#" class="text-white-80 text-decoration-none">Kebijakan dan Privasi</a></p>
                </div>
                <div class="col-lg-3 text-white-80 mt-2">
                    <h5 class="mb-lg-4 mb-2">Mari Berbagi</h5>
                    <form action="{{ url('/subscriber')}}" method="post" class="input-group mb-3">
                        <input type="email" name="email" class="form-control" value="{{ old('email')}}" placeholder="Masukan email">
                        @csrf
                        <div class="input-group-append">
                            <button class="btn btn-primary px-3">
                                <i class="fas fa-paper-plane"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    

    <script src="{{ asset('assets/backend/plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('assets/backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    
    @stack('scripts_vendor')
    
    <script src="{{ asset('assets/backend/dist/js/adminlte.js')}}"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script> --}}
    
    <script src="{{ asset('js/custom.js')}}"></script>
    {{-- <x-toast /> --}}
    @stack('scripts')
    
    <script>
        $('.navbar-toggler').on('click', function(){
            $(this).removeClass('first-load');
        })
    </script>

        
    {{-- <script>
        $('.custom-file-input').on('change', function (){
            let filename = $(this).val().split('\\').pop();
            $(this)
                .next('.custom-file-label')
                .addClass('selected')
                .html(filename)
        });

        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })

        function preview(target, image) {
            $(target)
                .attr('src', window.URL.createObjectURL(image))
                .show();
        }
    </script> --}}

  </body>
</html>