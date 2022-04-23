@extends('layouts.front')

@section('title', 'DARURAT! Peduli Korban Gempa Banten')


@section('content')

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <form action="" method="post">
                @csrf
                <div class="card">
                    <div class="card-body d-flex">
                        <div class="thumbnail rounded w-25" style="overflow: hidden">
                            <img src="{{asset('assets/backend/dist/img/user1-128x128.jpg')}}" alt="" >
                        </div>

                        <div class="body ml-3">
                            <h5>Anda akan berdonasi untuk:</h5>
                            <p>Membantu korban bencana alam</p>
                        </div>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-body">
                        <div class="bg-light rounded d-flex align-items-center p-3">
                            <h1 class="font-weight-bold w-25">Rp.</h1>
                            <input type="number" class="form-control" name="nominal" placeholder="Masukan nominal donasi">
                        </div>

                        <div class="alert alert-primary mt-3">
                            Donasi mulai dari Rp. berapapun dengan Dompet kebaikan.
                        </div>

                        @if (true)
                            <div class="form-group">
                                <label for="user_id">Donatur</label>
                                <select name="user_id" id="user_id" class="form-control">
                                    <option disabled selected>Pilih donatur</option>

                                </select>
                            </div>
                        @else
                            <input type="hidden" name="user_id" value="">
                        @endif

                        <div class="form-group">
                            <label for="">0857-1685-5817</label>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="anonim" name="anonim">
                                <label for="anonim" class="custom-control-label">Sembunyikan nama saya(Anonim)</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <textarea name="support" id="support" rows="4" class="form-control"
                                placeholder="Tulis dukungan atau doa untuk penggalang dana ini. Contoh: Semoga cepat sembuh ya!"></textarea>
                        </div>
                    </div>
                </div>

                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-primary btn-block">Lanjutkan Pembayaran</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection


