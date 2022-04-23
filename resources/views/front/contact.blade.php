@extends('layouts.front')

@section('title', 'Kontak')
@push('css')
    <style>
        @media(max-width: 575.98px){
            .text-lg{
                font-size: 8px;
            }
        }
    </style>
@endpush    


@section('content')

{{-- Banner --}}
<div class="banner bg-wecare2">
    <div class="container">
        <h2 class="fa-2x text-white">Kontak</h2>
    </div>
</div>

{{-- Punya Pertanyaan --}}
<div class="punya-pertanyaan bg-white">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="display-5 mb-4">Punya Pertanyaan ?</h2>
                <p class="mb-5 text-">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestias, labore. <br>
                    it amet consectetur adipisicing elit. Doloribus, rerum.
                </p>
            </div>
            <div class="col-lg-4 text-center">
                <p class="icon">
                    <i class="fas fa-phone fa-2x"></i>
                </p>
                <p class="font-weight-bold mb-1">Hubungi Kami</p>
                <p class="text mb-0">0857-1685-5817</p>
            </div>
            <div class="col-lg-4 text-center">
                <p class="icon">
                    <i class="fas fa-map fa-2x"></i>
                </p> 0838-7803-0875
                <p class="font-weight-bold mb-1">Alamat</p>
                <p class="text mb-0">Jl. Raya Meruyung <br>Depok, Jawa Barat</p>
            </div>
            <div class="col-lg-4 text-center">
                <p class="icon">
                    <i class="fas fa-envelope fa-2x"></i>
                </p>
                <p class="font-weight-bold mb-1">Email</p>
                <p class="text mb-0">wecare@gmail.com</p>
            </div>
        </div>
    </div>
</div>

{{-- form kontak --}}
<div class="punya-pertanyaan bg-white">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="display-5 mb-4">Punya Pertanyaan ?</h2>
                <p class="mb-5 text-">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestias, labore. <br>
                    it amet consectetur adipisicing elit. Doloribus, rerum.
                </p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8 ">
                <form action="" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Masukan nama">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Masukan no. telepon">
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="emal" class="form-control" placeholder="Masukan email">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Masukan subject">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea  rows="5" placeholder="Masukan pesan" class="form-control"></textarea>
                    </div>
                    <div class="form-group text-right">
                        <button class="btn btn-primary ">
                            <i class="fas fa-paper-plane"></i>
                            Kirim Pesan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection


