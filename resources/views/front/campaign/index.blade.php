@extends('layouts.front')

@section('title', 'Galang Dana')

@push('css-vendor')
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bs-stapper/dist/css/bs-stapper.min.css"> --}}
    <link rel="stylesheet" href="{{ asset('assets/backend/dist/css/bs-stepper.min.css')}}">
      <link rel="stylesheet" href="{{ asset('assets/backend/plugins/select2/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/backend/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">

@endpush

@section('content')

<div class="container py-5" style="min-height: calc(60px + 55vh);">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="bs-stepper">
                <div class="bs-stepper-header" role="tablist">
                    <!-- your steps here -->
                    <div class="step" data-target="#judul-part">
                        <button type="button" class="step-trigger" role="tab" aria-controls="judul-part" id="judul-part-trigger">
                            <span class="bs-stepper-circle">1</span>
                            <span class="bs-stepper-label d-lg-inline-block d-none">Judul</span>
                        </button>
                    </div>
                    <div class="line"></div>
                    <div class="step" data-target="#detail-part">
                        <button type="button" class="step-trigger" role="tab" aria-controls="detail-part" id="detail-part-trigger">
                            <span class="bs-stepper-circle">2</span>
                            <span class="bs-stepper-label d-lg-inline-block d-none">Detail</span>
                        </button>
                    </div>
                    <div class="line"></div>
                    <div class="step" data-target="#foto-part">
                        <button type="button" class="step-trigger" role="tab" aria-controls="foto-part" id="foto-part-trigger">
                            <span class="bs-stepper-circle">3</span>
                            <span class="bs-stepper-label d-lg-inline-block d-none">Foto</span>
                        </button>
                    </div>
                    <div class="line"></div>
                    <div class="step" data-target="#deskripsi-part">
                        <button type="button" class="step-trigger" role="tab" aria-controls="deskripsi-part" id="deskripsi-part-trigger">
                            <span class="bs-stepper-circle">4</span>
                            <span class="bs-stepper-label d-lg-inline-block d-none">Deskripsi</span>
                        </button>
                    </div>
                    <div class="line"></div>
                    <div class="step" data-target="#konfirmasi-part">
                        <button type="button" class="step-trigger" role="tab" aria-controls="konfirmasi-part" id="konfirmasi-part-trigger">
                            <span class="bs-stepper-circle">5</span>
                            <span class="bs-stepper-label d-lg-inline-block d-none">Konfirmasi</span>
                        </button>
                    </div>
                </div>
                <div class="bs-stepper-content">
                    <!-- your steps content here -->
                    <div id="judul-part" class="content" role="tabpanel" aria-labelledby="judul-part-trigger">
                        @include('front.campaign.step.judul')
                    </div>
                    <div id="detail-part" class="content" role="tabpanel" aria-labelledby="detail-part-trigger">
                        @include('front.campaign.step.detail')
                    </div>
                    <div id="foto-part" class="content" role="tabpanel" aria-labelledby="foto-part-trigger">
                        @include('front.campaign.step.foto')
                    </div>
                    <div id="deskripsi-part" class="content" role="tabpanel" aria-labelledby="deskripsi-part-trigger">
                        @include('front.campaign.step.deskripsi')
                    </div>
                    <div id="konfirmasi-part" class="content" role="tabpanel" aria-labelledby="konfirmasi-part-trigger">
                        @include('front.campaign.step.konfirmasi')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('script-vendor')
    <script src="{{ asset('assets/backend/plugins/moment/moment.min.js')}}"></script>
    <script src="{{ asset('assets/backend/plugins/select2/js/select2.full.min.js')}}"></script>

    <script src="{{ asset('assets/backend/dist/js/bs-stepper.min.js')}}"></script>
        {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bs-stapper/dist/css/bs-stapper.min.js"> --}}

@endpush

@includeIf('includes.select2')

@push('scripts')
    <script>
        $(document).ready(function (){
            window.stepper = new Stepper($('.bs-stepper')[0])
        });

        $('.select2').select2({
            theme: 'bootstrap4',
            placeholder: 'Pilih Kategori',
            closeOnSelect: true,
            allowClear: true,
        });

        $('.custom-file-input').on('change', function (){
            let filename = $(this).val().split('\\').pop();
            $(this)
                .next('.custom-file-label')
                .addClass('selected')
                .html(filename)
        });

        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })

        function preview(target, image) {
            $(target)
                .attr('src', window.URL.createObjectURL(image))
                .show();
        }

        // $('.select2-search__field').css('width','100%');
        // $('.select2-container--bootstrap4 .select2-selection--multiple .select2-search__field')
        //     .css('margin-left', '.3rem')
        //     .css('margin-top', '.35rem');

    </script>
@endpush


