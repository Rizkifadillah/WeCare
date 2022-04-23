@extends('layouts.app')

@section('title', 'Kategori')
    {{-- @endsection --}}

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item" ><a href="{{route('category.index')}}">Kategori</a></li>
    <li class="breadcrumb-item" active>Tambah Kategori</li>
@endsection

@section('content')
        <div class="row">
            <div class="col-lg-12">
                <form action="{{ route('category.update', $category->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <x-card>
                        <div class="form-group row">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') ?? $category->name}}" name="name"  required>
                             @error('name')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <x-slot name="footer">
                            <button type="reset" class="btn btn-dark">Reset</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </x-slot>
                    </x-card>
                </form>
            </div>
        </div>  
@endsection
