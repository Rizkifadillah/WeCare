@extends('layouts.guest')

@section('title','Login')
    
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
                            <h4 class="login-heading mb-4 mt-2">Selamat Datang Kembali</h4>

                            <form action="{{ route('login')}}" method="post">
                                @csrf

                                <div class="form-group mb-3">
                                    <label for="email">Email</label>
                                    <input type="email" value="{{ old('email')}}" class="form-control @error('email') is-invalid @enderror" id="email" name="email">
                                    @error('email')
                                        <span class="invalid-feedback">
                                            {{$message}}    
                                        </span>                                        
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                                    @error('password')
                                        <span class="invalid-feedback">
                                            {{$message}}    
                                        </span>                                        
                                    @enderror
                                </div>
                                <div class="form-group d-flex justify-content-between align-items-center mb-3">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label for="customCheck1" class="custom-control-label">Ingat Saya?</label>
                                    </div>
                                    <a href="#" class="small mt-1 text-muted">Lupa Password?</a>
                                </div>

                                <div class="d-grid">
                                    <button type="submit" class="btn btn-sm btn-primary btn-login mb-2">
                                        <i class="fas fa-sign-in-alt"></i> Masuk
                                    </button>
                                </div>

                                <div class="text-center mt-3">
                                    <div class="text-muted">Jika belum punya akun silahkan registrasi
                                        <a href="{{ route('register')}}" class="text-muted text-primary">disini</a>
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