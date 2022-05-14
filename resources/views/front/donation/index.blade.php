@extends('layouts.front')

@section('title', 'Donasi')

@push('css')

<style>
        .form-control .control-lg{
          height: calc(1.5rem * 1rem + 2px);
          padding: 0.5rem 1rem;
          line-height: 1.5;
          border-radius: 0.3rem;
        }
        .kategori .card {
            border: 0;
            box-shadow: 0 1rem 3rem rgba(0,0,0, .1) !important;
            transition: .5s;
        }
        .kategori .card:hover,
        .kategori .card:focus{
            transform: translateY(-5px);
        }

        .page-item .page-link{
            background: transparent;
            border-radius: .35rem;
            border: none;
            padding: .75rem 1rem;
            font-weight: 700;
            font-size: .9rem;
            color: #454545;
        }
        .page-item.disabled .page-link{
            background: transparent;
        }

        .page-item.active .page-link{
            z-index: 3;
            color: #ffffff;
            background: var(--primary);
            border-color: var(--primary);
        }
        
    
</style>
    
@endpush

@push('css_vendor')

      <link rel="stylesheet" href="{{ asset('assets/backend/plugins/select2/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/backend/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">

    
@endpush

@section('content')

{{-- Banner --}}
<div class="banner bg-wecare2">
    <div class="container col-lg-8 text-justify">
        <h2 class="fa-2x text-white">#Semua Kategori</h2>
    </div>
</div>

{{-- Donasi --}}
<div class="kategori bg-white">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h5>Halo #orang baik</h5>
                <p>Pilih campaign yang ingin anda bantu</p>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {{-- @dd(request()->categories) --}}
                    <form action="{{ url('/donation')}}">
                        <select name="categories[]" id="categories" class="select2 form-control"  multiple onchange="$(this.form).submit()" 
                            data-placeholder="Pilih Kategori" style="width: 100%;" 
                            data-select2-id="7" tabindex="-1" aria-hidden="true">
                            @foreach ($category as $key => $item)
                                <option value="{{ $key }}" {{request()->has('categories') && in_array($key, request()->categories) ? 'selected' : ''}}>{{ $item }}</option>
                            @endforeach
                        </select>
                    </form>
                </div>

            </div>

            @foreach ($campaign as $item)
                <div class="col-lg-4 col-md-6">
                    <div class="card mt-4" >
                        <div class="rounded-top" style="height: 200px; overflow: hidden;">
                            @if (Storage::disk('public')->exists( $item->path_image))
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

    <div class="pagination pb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 d-flex justify-content-center">
                    <x-pagination-card :model="$campaign"/>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <x-pagination-table :model="$campaign"/> --}}




@endsection

@push('scripts')
<script>
    $('.select2').select2({ 
        theme: 'bootstrap4',
        placeholder: 'Pilih Kategori',
        closeOnSelect: true,
        allowClear: true,
    });
    </script>
@endpush

@push('scripts_vendor')
<script src="{{ asset('assets/backend/plugins/select2/js/select2.full.min.js')}}"></script>
    
    
@endpush



