@extends('layouts.front')

@section('title', 'Terimakasih Rizki')

@section('content')

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <h5 class="text-center">Konfirmasi Pembayaran</h5>
            <div class="detail d-flex justify-content-around align-items center text-center mt-3">
                <p>ID Transaksi #008877766</p>
            </div>

            <form action="" method="post" class="mt-3 mt-lg-4">
                <div class="form-group">
                    <label for="name">Atas Nama (Pengirim) <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="form-group">
                    <label for="nominal">Jumlah Nominal Transfer <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" name="nominal">
                </div>
                <div class="form-group">
                    <label for="bank_id">Bank <span class="text-danger">*</span></label>
                    <select name="bank_di" id="bank_id" class="form-control">
                        <option disabled selected >Pilih Bank</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="path_image">Upload Bukti Pembayaran <span class="text-danger">*</span></label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="path_image" name="path_image">
                        <label for="path_image" class="custom-file-label">Choose file</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="note">Keterangan</label>
                    <textarea name="note" id="note" rows="5" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary">
                        <i class="fas fa-paper-plane">Kirim Pesan</i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection


