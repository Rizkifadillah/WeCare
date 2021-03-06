@extends('layouts.front')

@section('title', 'Mari Kita Saling Berbagi')
@push('css')
    <style>
    /* Jumbotron */
    .jumbotron {
        height: 87.5vh;
        background-image: url('{{ asset("/img/bgcharity1.jpg") }}');
        background-size: cover;
        background-repeat: no-repeat;
        border-radius: 0;
    }
    .jumbotron .bg-white-50:hover {
        background: rgb(255, 255, 255, .15);
    }
    @media (max-width: 575.98px) {
        .jumbotron .btn.rounded {
            width: 100% !important;
        }
        .jumbotron .display-4 {
            font-size: 42px;
        }
    }

    /* Info Campaign */
    @media (max-width: 575.98px) {
        .info-campaign .fa-2x.text {
            font-size: 24px;
        }
    }

    /* Dana Tersalurkan */
    .dana-tersalurkan .card {
        border: 0;
        box-shadow: 0 1rem 3rem rgb(0, 0, 0, .1) !important;
        transition: 1s;
    }
    .dana-tersalurkan .card:hover,
    .dana-tersalurkan .card:focus {
        transform: translateY(-5px);
    }

    /* Galang Dana2 */
    @media (max-width: 575.98px) {
        .galang-dana2 .fa-3x {
            font-size: 32px;
        }
        .galang-dana2 h3 {
            font-size: 18px;
        }
    }
</style>
@endpush    


@section('content')

{{-- jumbotron --}}
<div class="jumbotron d-flex justify-content-center align-items-center mb-0">
    <div class="shadow-sm p-3 bg-white-50 rounded">
        <div class="card p-4 border text-center mb-0">
            <h1 class="display-4 font-weight-bold">
                GALANG DANA
            </h1>
            <p class="lead text-capitalize mt-3">
                Untuk Hal Yang Anda Perjuangkan Demi Kemanusiaan
            </p>
            <a href="{{ route('campaign.create')}}" class="btn btn-primary btn-lg rounded w-50 m-auto">Galang Dana Sekarang</a>
        </div>
    </div>
</div>

{{-- info --}}

<div class="info-campaign bg-dark">
    <div class="container text-white py-5">
        <div class="row text-center">
            <div class="col-lg-3 col-md-6">
                <p class="icon">
                    <i class="fas fa-smile fa-4x"></i>
                </p>
                <p class="fa-2x font-weight-bold">{{ format_uang($donatur)}}</p>
                <p class="fa-2x text mb-0 text-uppercase">Donatur</p>
            </div>
            <div class="col-lg-3 col-md-6">
                <p class="icon">
                    <i class="fas fa-rocket fa-4x"></i>
                </p>
                <p class="fa-2x font-weight-bold">{{ format_uang($misiSukses)}}</p>
                <p class="fa-2x text mb-0 text-uppercase">Misi Sukses</p>
            </div>
            <div class="col-lg-3 col-md-6">
                <p class="icon">
                    <i class="fas fa-user-plus fa-4x"></i>
                </p>
                <p class="fa-2x font-weight-bold">{{ format_uang($relawan)}}</p>
                <p class="fa-2x text mb-0 text-uppercase">relawan</p>
            </div>
            <div class="col-lg-3 col-md-6">
                <p class="icon">
                    <i class="fas fa-globe fa-4x"></i>
                </p>
                <p class="fa-2x font-weight-bold">{{ format_uang($projek)}}</p>
                <p class="fa-2x text mb-0 text-uppercase">project</p>
            </div>
        </div>
    </div>
</div>

{{-- dana tersalurkan --}}
<div class="dana-tersalurkan">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="fa-3x mb-4">DANA TERSALURKAN</h2>
                <h3 class="font-weight-bold mb-3">
                    Jika anda dapat bergabung dengan kami sekarang, <br>
                    maka semakin banyak yang terbantu
                </h3>
            </div>


            @foreach ($campaign as $item)
                <div class="col-lg-4 col-md-6">
                    <div class="card mt-4" >
                        <div class="rounded-top" style="height: 200px; overflow: hidden;">
                            @if (Storage::disk('public')->exists( $item->path_image))
                            {{-- @dd(Storage::disk('public')->url( $item->path_image)) --}}
                                <img src="{{ Storage::disk('public')->url( $item->path_image) }}" alt="" class="card-img-top">
                            @else
                                <img src="{{ asset('img/bank/bri.png')}}" alt="" class="card-img-top">
                            @endif
                        </div>
                        <div class="card-body p-2">
                            <div class="d-flex justify-content-between text-dark">
                                <p class="mb-0">Terkumpul: <strong>Rp. {{ format_uang($item->nominal)}}</strong></p>
                                <p class="mb-0">Goal: <strong>Rp. {{ format_uang($item->goal)}}</strong></p>
                            </div>
                        </div>
                        <div class="card-body p-2 border-top">
                            <h5 class="card-title">{{ $item->title }}</h5>
                            <p class="card-text">
                                {{ Str::limit($item->short_description, 90)}}
                            </p>
                        </div>
                        <div class="card-footer p-2">
                            <a href="{{ url('/donation/'. $item->id)}}" class="btn btn-primary d-block rounded text-white">
                                <i class="fas fa-donate mr-2">Donasi Sekarang</i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

{{-- galang dana --}}

<div class="galang-dana2 bg-white">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="fa-3x mb-4">
                    GALANG DANA DI WE<strong class="text-primary">CARE</strong>
                </h2>
                <h3 class="font-weight-bold mb-3">
                    Dari menolong orang sekitar anda dan keluarga, hingga membantu kemanusiaan terdampak perang <br>
                    Ribuan orang telah menggunakan WE<strong class="text-primary">CARE</strong> untuk galang dana.
                </h3>
                <a href="{{ route('campaign.create')}}" class="btn btn-primary btn-lg rounded m-auto">Galang Dana Sekarang</a>
            </div>
        </div>
    </div>
</div>

@endsection

<x-toast />



