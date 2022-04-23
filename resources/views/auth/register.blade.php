@extends('layouts.guest')

@section('title','Register')
    
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image">
            </div>
            <div class="col-md-8 col-lg-6">
                <div class="login d-flex align-items-center py-5 ml-4">
                    <div class="row ml-4 ml-2x">
                        <div class="col-md-12 col-lg-12 mx-auto">
                            <a href="{{ url('/')}}">
                                {{-- <img src="{{asset('/img/logo.png')}}" alt="" class="w-50 mb-4"> --}}
                                <div class="d-flex">

                                    <img src="{{ asset('img/favicon.png')}}" alt="" style="width: 50px;">
                                    <h3 class="mt-2 text-dark">We<strong class="text-primary">Care</strong></h3>
                                </div>

                            </a>
                            <h4 class="login-heading mb-4 mt-2">Silahkan Lengkapi Form Registrasi</h4>

                            <form action="{{ route('register')}}" method="post">
                                @csrf

                                <div class="form-group mb-3">
                                    <label for="name">Nama</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name')}}">
                                    @error('name')
                                        <span class="invalid-feedback">
                                            {{$message}}    
                                        </span>                                        
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email')}}">
                                    @error('email')
                                        <span class="invalid-feedback">
                                            {{$message}}    
                                        </span>                                        
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" >
                                    @error('password')
                                        <span class="invalid-feedback">
                                            {{$message}}    
                                        </span>                                        
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="password_confirmation">Konfirmasi Password</label>
                                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" " id="password_confirmation" name="password_confirmation">
                                    @error('password_confirmation')
                                        <span class="invalid-feedback">
                                            {{$message}}    
                                        </span>                                        
                                    @enderror
                                </div>
                               
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-sm btn-primary btn-login mb-2">
                                        <i class="fas fa-sign-in-alt"></i>Daftar
                                    </button>
                                </div>

                                <div class="text-center mt-3">
                                    <div class="text-muted">Sudah punya akun? silahkan login 
                                        <a href="{{ route('login')}}" class="text-muted text-primary">disini</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection