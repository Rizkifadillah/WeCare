@extends('layouts.front')

@section('title', 'Terimakasih'.$campaign->user->name)

@section('content')

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <h5 class="text-center">Konfirmasi Pembayaran</h5>
            <div class="detail d-flex justify-content-around align-items center text-center mt-3">
                <p>ID Transaksi #{{$donation->order_number}}</p>
                <p class="badge badge-{{ $donation->statusColor() }}">{{ $donation->statusText() }}</p>
            </div>

            <form class="mt-3 mt-lg-4" action="{{ url('/donation/'. $campaign->id .'/payment-confirmation/'. $donation->order_number)}}" method="post"  enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Atas Nama (Pengirim) <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? ($payment->name ?? $donation->user->name)}}">
                    @error('name')
                    <div class="invalid-feedback">
                        {{$message}}    
                    </div>                            
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nominal">Jumlah Nominal Transfer <span class="text-danger">*</span></label>
                    <input type="number" class="form-control @error('nominal') is-invalid @enderror" name="nominal" value="{{ old('nominal') ?? ($payment->nominal ?? $donation->nominal)}}">
                    @error('nominal')
                    <div class="invalid-feedback">
                        {{$message}}    
                    </div>                            
                    @enderror
                </div>
                <div class="form-group">
                    <label for="bank_id">Bank <span class="text-danger">*</span></label>
                    <select name="bank_id" id="bank_id" class="form-control @error('bank_id') is-invalid @enderror">
                        <option disabled selected >Pilih Bank</option>
                        @foreach ($bank as $key => $item)
                            <option value="{{ $key }}" {{ 
                                old('bank_id') == $key 
                                ? 'selected' 
                                : ($payment->bank_id == $key 
                                    ? 'selected' 
                                    : ($mainAccount && $mainAccount->pivot->bank_id == $key
                                        ? 'selected'
                                        : ''
                                    )
                                ) 
                            }}>{{ $item }}</option>
                            {{-- <option value="{{$key}}" {{ old('bank_id') == $key ? 'selected' : ($payment->bank_id == $key ? 'selected' : '')}}> {{ $item}} </option> --}}
                        @endforeach
                    </select>
                    @error('bank_id')
                    <div class="invalid-feedback">
                        {{$message}}    
                    </div>                            
                    @enderror
                </div>
                <div class="form-group">
                    <label for="path_image">Gambar</label>
                    <div class="custom-file">
                        <input type="file" name="path_image" class="custom-file-input @error('path_image') is-invalid @enderror" id="path_image" 
                        onchange="preview('.preview-path-image', this.files[0])">
                        <label for="path_image" class="custom-file-label">Choose file</label>
                    </div>
                    @error('path_image')
                    <div class="invalid-feedback">
                        {{$message}}    
                    </div>                            
                    @enderror
                    
                    @if (Storage::disk('public')->exists($payment->path_image))
                        <img src="{{ Storage::disk('public')->url($payment->path_image)}}" alt="" class="img-thumbnail preview-path-image m-2 w-25" >
                    @else
                        <img src="" alt="" class="img-thumbnail preview-path-image m-2 w-25" style="display: none;">
                    @endif
                </div>
                
                <div class="form-group">
                    <label for="note">Keterangan</label>
                    <textarea name="note" id="note" rows="5" class="form-control @error('note') is-invalid @enderror">{{ old('note') ?? $payment->note}}</textarea>
                    @error('note')
                    <div class="invalid-feedback">
                        {{$message}}    
                    </div>                            
                    @enderror
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


<x-toast />