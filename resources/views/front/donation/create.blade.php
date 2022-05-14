@extends('layouts.front')

@section('title', $campaign->title)

@push('css')
          <link rel="stylesheet" href="{{ asset('assets/backend/plugins/select2/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/backend/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">

@endpush


@section('content')

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <form action="{{ url('/donation/'. $campaign->id .'/create')}}" method="post">
                @csrf
                <div class="card">
                    <div class="card-body d-flex">
                        <div class="thumbnail rounded w-25" style="overflow: hidden">
                            @if (Storage::disk('public')->exists( $campaign->path_image))
                                <img src="{{ Storage::disk('public')->url( $campaign->path_image) }}" alt="" class="w-100">
                            @else
                                <img src="{{asset('assets/backend/dist/img/user1-128x128.jpg')}}" alt="" class="w-100" >
                            @endif
                        </div>

                        <div class="body ml-3">
                            <h5>Anda akan berdonasi untuk:</h5>
                            <p>{{$campaign->title}}</p>
                        </div>
                    </div>
                </div>
                @if ($campaign->goal == $campaign->donations->sum('nominal'))
                    <div class="alert alert-light border-danger text-danger">
                        <i class="fas fa-info-circle"></i> 
                        Projek sudah mencapai goal, apakah yakin ingin tetap berdonasi pada untuk projek terpilih.

                        <button type="button" class="close text-danger" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="card mt-3">
                    <div class="card-body">
                        <div class="bg-light rounded d-flex align-items-center p-3">
                            <h1 class="font-weight-bold w-25">Rp.</h1>
                            <div class="form-group w-75">
                                <input type="text" class="form-control @error('nominal') is-invalid @enderror" name="nominal" value="{{ old('nominal') }}" placeholder="Masukan nominal donasi" onkeyup="format_uang(this)">
                                @error('nominal')
                                <div class="invalid-feedback">
                                    {{$message}}    
                                </div>                            
                                @enderror
                            </div>
                        </div>

                        <div class="alert alert-primary mt-3">
                            Donasi mulai dari Rp.500 berapapun dengan Dompet kebaikan.
                        </div>

                        @if (auth()->user()->hasRole('admin'))
                            <div class="form-group">
                                <label for="user_id">Donatur</label>
                                <select name="user_id" id="user_id" class="form-control select2 @error('user_id') is-invalid @enderror" data-placeholder="Pilih salah satu">
                                    <option disabled selected>Pilih salah satu</option>
                                    @foreach ($user as $item)
                                        <option value="{{ $item->id }}" data-phone="{{$item->phone}}" {{ old('user_id') == $item->id ? 'selected' : ''}}>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @error('user_id')
                                    <div class="invalid-feedback">
                                        {{$message}}    
                                    </div>                            
                                @enderror
                            </div>
                            <div class="form-group mb-0 phone" style="display: none;">
                                <label for=""></label>
                                
                            </div>
                        @else
                            <input type="hidden" name="user_id" value="{{ auth()->id()}}">
                            <div class="form-group mb-0" style="display: none;">
                                <label for="">{{ auth()->user()->phone}}</label>
                            </div>
                        @endif
                        
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="anonim" name="anonim" value="1" {{ old('anonim') == 1 ? 'checked' : ''}}>
                                <label for="anonim" class="custom-control-label">Sembunyikan nama saya(Anonim)</label>
                            </div>
                        </div>
                        

                        <div class="form-group">
                            <textarea name="support" id="support" rows="4" class="form-control"
                                placeholder="Tulis dukungan atau doa untuk penggalang dana ini. Contoh: Semoga cepat sembuh ya!">{{ old('support') }}</textarea>
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

@push('scripts_vendor')
    
    <script src="{{ asset('assets/backend/plugins/select2/js/select2.full.min.js')}}"></script>

@endpush

@include('includes.select2')

@push('scripts')
    <script>
        $('[name=user_id').on('change', function(){
            let value = $(this).val();
            let phone = $(`[name=user_id] option[value=${value}]`).data('phone')
            console.log(phone);
            $('.phone').show()
            $('.phone label').text(phone);
        })
    </script>
@endpush