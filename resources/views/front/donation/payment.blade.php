@extends('layouts.front')

@section('title', 'Terimakasih Rizki')

@push('css')

<style>
    .informasi{
        height: 120px;
    }
    @media (wax-width: 575.98px){
        .info{
            border-radius: .25rem;
        }
        .informasi{
            height: 140px;
        }
    }
</style>
    
@endpush


@section('content')

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <h5 class="text-center">Terimakasih Rizki Fadillah</h5>
            <div class="detail d-flex justify-content-around align-items center text-center mt-3">
                <p>ID Transaksi #008877766</p>
                <p>Total Tagihan <strong>Rp. {{ format_uang(300000)}}</strong></p>
            </div>

            <div class="row justify-content-between mt-3 mt-lg-4">
                <div class="col-lg-3 col-md-4 text-center">
                    <img src="{{ asset('/img/bank/bri.png')}}" alt="" class="w-100">
                    <p class="mt-3 text-muted">000999888777666</p>
                </div>
                <div class="col-lg-3 col-md-4 text-center">
                    <img src="{{ asset('/img/bank/bri.png')}}" alt="" class="w-100">
                    <p class="mt-3 text-muted">000999888777666</p>
                </div>
                <div class="col-lg-3 col-md-4 text-center">
                    <img src="{{ asset('/img/bank/bri.png')}}" alt="" class="w-100">
                    <p class="mt-3 text-muted">000999888777666</p>
                </div>
            </div>

            <p class="text-center mt-3 mt-lg-4">
                Harap tranfer sesuai dengan nominal "<strong>TOTAL TAGIHAN</strong>" kebank yang tertera di atas! <br>
                Setelah transfer lakukan konfirmasi! perbedaan nilai transfer akan menghambat proses verifikasi.
            </p>

            <div class="text-center mt-3 mt-lg-4">
                <a href="{{ url('/donation/1/payment-confirmation')}}" class="btn btn-primary">Konfirmasi Pembayaran</a>
            </div>

            <div class="informasi d-flex justify-content-center align-items-center mt-3 mt-lg-4" >
                <div class="bg-info rounded-left d-none d-lg-block w-25 pt-4 text-center text-white h-100">
                    <i class="fas fa-info fa-4x m-auto"></i>
                </div>
                <div class="bg-white rounded-right info text-center w-100 p-4 h-100">
                    <p>
                        Kami sudah membuat akun WeCare untuk anda, silahkan cek email anda.
                    </p>
                    <strong>(wecare@gmail.com)</strong> 
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

