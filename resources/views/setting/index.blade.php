@extends('layouts.app')

@section('title', 'Profil')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Profil</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a  class="nav-link @if(request('pills') == '') active @endif" href="{{ route('setting.index')}}">Identitas</a>
                </li>
                <li class="nav-item">
                    <a  class="nav-link @if(request('pills') == 'logo') active @endif" href="{{ route('setting.index')}}?pills=logo">Logo</a>
                </li>
                <li class="nav-item">
                    <a  class="nav-link @if(request('pills') == 'sosial-media') active @endif" href="{{ route('setting.index')}}?pills=sosial-media">Sosial Media</a>
                </li>
                <li class="nav-item">
                    <a  class="nav-link @if(request('pills') == 'bank') active @endif" href="{{ route('setting.index')}}?pills=bank">Bank</a>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade @if(request('pills') == '') show active @endif" id="pills-general" role="tabpanel" aria-labelledby="pills-general-tab">
                    @include('setting.general')
                </div>
                <div class="tab-pane fade @if(request('pills') == 'logo') show active @endif" id="pills-logo" role="tabpanel" aria-labelledby="pills-logo-tab">
                    @include('setting.logo')
                </div>
                <div class="tab-pane fade @if(request('pills') == 'sosial-media') show active @endif" id="pills-sosial-media" role="tabpanel" aria-labelledby="pills-sosial-media-tab">
                    @include('setting.sosial-media')
                </div>

                <div class="tab-pane fade @if(request('pills') == 'bank') show active @endif" id="pills-bank" role="tabpanel" aria-labelledby="pills-bank-tab">
                    @include('setting.bank')
                </div>
            </div>
        </div>
    </div>
    <x-toast />

@endsection

@includeIf('includes.summernote')