@extends('layouts.front')

@section('title', 'DARURAT! Peduli Korban Gempa Banten')

@push('css')

<style>
    .daftar-donasi.nav-pills .nav-link.active, 
    .daftar-donasi.nav-pills .show>.nav-link{
        background: transparent;
        color: var(--dark);
        border-bottom: 3px solid var(--blue);
        border-radius: 0;
    }
</style>
    
@endpush

@section('content')

{{-- Banner --}}
<div class="banner bg-wecare2">
    <div class="container col-lg-8 text-justify">
        <h2 class="fa-2x text-white">DARURAT! Peduli Korban Gempa Banten</h2>
    </div>
</div>

{{-- datail --}}
<div class="detail bg-white">
    <div class="container py-5 col-lg-10">
        <div class="row justify-content-between">
            <div class="col-lg-7">
                <div class="d-flex align-items-center">
                    <div class="img rounded-circle" style="width: 60px; overflow:hidden;">
                        <img src="{{asset('assets/backend/dist/img/user1-128x128.jpg')}}" alt="" class="w-100">
                    </div>
                    <div class="ml-3">
                        <strong class="d-block">Username</strong>
                        <small class="text-muted">20-April-2022</small>
                    </div>
                </div>
                <div class="thumbnail rounded mt-4" style="overflow: hidden;">
                    <img src="{{asset('assets/backend/dist/img/photo1.png')}}" alt="" class="w-100">
                </div>
                <div class="body mt-4">
                    <h5>Juduj Jududl</h5>

                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi laborum nesciunt minus blanditiis eaque dolore commodi molestiae laudantium eos velit!</p>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ea reiciendis sit dolorem.</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti a laudantium in exercitationem!</p>

                    <h5>Lorem ipsum dolor sit amet.</h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur fugiat fugit illum odit, sequi molestiae delectus. Repudiandae nemo eaque consequatur!</p>

                    <div class="kategori border-top pt-3">
                        <a href="" class="badge badge-primary p-2 rounded-pill">Kategori</a>
                    </div>
                    <hr class="d-lg-none d-block">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card border-0 shadow-0">
                    <h1 class="font-weight-bold">Rp. {{format_uang(300000)}}</h1>
                    <p class="font-weight-bold">Terkumpul dari Rp. {{ format_uang(10000000)}}</p>
                    <div class="progress" style="height: .3rem;">
                        <div class="progress-bar" role="progressbar" style="width: 7%" aria-valuenow="7" aria-valuemin="0"
                            aria-valuemax="100"></div>
                    </div>
                    <div class="d-flex justify-content-between mt-1">
                        <p>7% tercapai</p>
                        <p>3 bulan lagi</p>
                    </div>
                    <div class="donasi mt-2 mb-4">
                        <a href="{{ url('donation/1/create')}}" class="btn btn-primary btn-block">Donasi Sekarang</a>
                    </div>

                    <div class="h4 font-weight-bold">Donatur (30)</div>
                    <ul class="nav nav-pills mb-3 daftar-donasi" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a href="#pills-waktu" class="nav-link active" id="pills-waktu-tab" data-toggle="pill" role="tab"
                        aria-controls="pills-waktu" aria-selected="true">Waktu</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a href="#pills-jumlah" class="nav-link" id="pills-jumlah-tab" data-toggle="pill" role="tab"
                        aria-controls="pills-jumlah" aria-selected="false">Jumlah</a>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-waktu" role="tabpanel" aria-labelledby="pills-waktu-tab">
                    @for ($i = 0; $i < 5; $i++)
                        <div @if($i > 0) class="mt-2" @endif>
                            <p class="font-weight-bold mb-0">User</p>
                            <p class="font-weight-bold mb-0">Rp. {{format_uang(100000)}}</p>
                            <p class="text-muted mb-0">{{tanggal_indonesia(date('Y-m-d'))}}</p>
                        </div>
                    @endfor
                </div>
                <div class="tab-pane fade" id="pills-jumlah" role="tabpanel" aria-labelledby="pills-jumlah-tab">
                    ....
                </div>
            </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection


