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
                <div class="card">
                    <form action="{{ route('category.update', $category->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="name">Nama</label>
                                <input type="text" class="form-control" name="name" value="{{$category->name}}" required>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-dark">Reset</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>  
@endsection
