@extends('layouts.front')

@section('title', $campaign->title)

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
        <h2 class="fa-2x text-white">{{$campaign->title}}</h2>
    </div>
</div>

{{-- datail --}}
<div class="detail bg-white">
    <div class="container py-5 col-lg-10">
        <div class="row justify-content-between">
            <div class="col-lg-7">
                <div class="d-flex align-items-center">
                    <div class="img rounded-circle" style="width: 60px; overflow:hidden;">
                        @if (Storage::disk('public')->exists($campaign->user->path_image))
                            <img src="{{Storage::disk('public')->url($campaign->user->path_image)}}" alt="" class="w-100">
                        @else
                            <img src="{{asset('assets/backend/dist/img/user1-128x128.jpg')}}" alt="" class="w-100">                        
                        @endif
                    </div>
                    <div class="ml-3">
                        <strong class="d-block">{{ $campaign->title}}</strong>
                        <small class="text-muted">{{ tanggal_indonesia($campaign->publish_date)}}</small>
                    </div>
                </div>
                <div class="thumbnail rounded mt-4" style="overflow: hidden;">
                    @if (Storage::disk('public')->exists($campaign->path_image))
                        <img src="{{Storage::disk('public')->url($campaign->path_image)}}" alt="" class="w-100">
                    @else
                        <img src="{{asset('assets/backend/dist/img/photo1.png')}}" alt="" class="w-100">
                    @endif
                </div>
                <div class="body mt-4">
                    <h5>{{$campaign->short_description}}</h5>

                    {!!$campaign->body!!}
                    <div class="kategori border-top pt-3">
                        @if ($campaign->category_campaign)
                            @foreach ($campaign->category_campaign as $item)
                                <a href="" class="badge badge-primary p-2 rounded-pill">{{$item->name}}</a>
                            @endforeach
                        @endif
                    </div>
                    <hr class="d-lg-none d-block">
                </div>
            </div>
            <div class="col-lg-4">
                 <x-card>
                    <h1 class="font-weight-bold">Rp. {{ format_uang($campaign->nominal) }}</h1>
                    <p class="font-weight-bold">Terkumpul dari Rp. {{ format_uang($campaign->goal) }}</p>
                    <div class="progress" style="height: .3rem;">
                        <div class="progress-bar" role="progressbar" style="width: {{ $campaign->nominal / $campaign->goal * 100 }}%" aria-valuenow="{{ $campaign->nominal / $campaign->goal * 100 }}" aria-valuemin="0" aria-valuemax="{{ 100 }}"></div>
                    </div>
                    <div class="d-flex justify-content-between mt-1">
                        <p>{{ $campaign->nominal / $campaign->goal * 100 }}% tercapai</p>
                        @if (now()->parse($campaign->end_date)->lt(now()))
                        <p>selesai {{ now()->parse($campaign->end_date)->diffForHumans() }}</p>
                        @else
                        <p>tersisa {{ now()->parse($campaign->end_date)->diffForHumans() }}</p>
                        @endif
                    </div>

                    <div class="donasi mt-2 mb-4">
                        <a href="{{ url('/donation/'. $campaign->id .'/create') }}" class="btn btn-primary btn-lg btn-block">Donasi Sekarang</a>
                    </div>
        
                    <h4 class="font-weight-bold">Donatur ({{ $campaign->donations->where('status', 'confirmed')->count() }})</h4>
                    <ul class="nav nav-pills mb-3 daftar-donasi" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-waktu-tab" data-toggle="pill" href="#pills-waktu"
                                role="tab" aria-controls="pills-waktu" aria-selected="true">Waktu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-jumlah-tab" data-toggle="pill" href="#pills-jumlah"
                                role="tab" aria-controls="pills-jumlah" aria-selected="false">Jumlah</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-waktu" role="tabpanel"
                            aria-labelledby="pills-waktu-tab">
                            @forelse ($campaign->donations->where('status', 'confirmed')->sortBy('created_at')->load('user') as $key => $item)
                            <div @if ($key > 0) class="mt-1" @endif>
                                @if ($item->anonim)
                                <p class="font-weight-bold mb-0">{{ sembunyikan_text($item->user->name, 3) }}</p>
                                @else
                                <p class="font-weight-bold mb-0">{{ $item->user->name }}</p>
                                @endif
                                <p class="font-weight-bold mb-0">Rp. {{ format_uang($item->nominal) }}</p>
                                <p class="text-muted mb-0">{{ tanggal_indonesia($item->created_at) }}</p>
                            </div>
                            @empty
                            <p class="text-muted mb-0">Belum tersedia</p>
                            @endforelse
                        </div>
                        <div class="tab-pane fade" id="pills-jumlah" role="tabpanel"
                            aria-labelledby="pills-jumlah-tab">
                            @forelse ($campaign->donations->where('status', 'confirmed')->sortBy('nominal')->load('user') as $key => $item)
                            <div @if ($key > 0) class="mt-1" @endif>
                                @if ($item->anonim)
                                <p class="font-weight-bold mb-0">{{ sembunyikan_text($item->user->name, 3) }}</p>
                                @else
                                <p class="font-weight-bold mb-0">{{ $item->user->name }}</p>
                                @endif
                                <p class="font-weight-bold mb-0">Rp. {{ format_uang($item->nominal) }}</p>
                                <p class="text-muted mb-0">{{ tanggal_indonesia($item->created_at) }}</p>
                            </div>
                            @empty
                            <p class="text-muted mb-0">Belum tersedia</p>
                            @endforelse
                        </div>
                    </div>
                </x-card>
            </div>
        </div>
    </div>
</div>



@endsection