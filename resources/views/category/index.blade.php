@extends('layouts.app')

@section('title', 'Kategori')
    {{-- @endsection --}}

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item" active>Kategori</li>
@endsection

@section('content')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('category.create')}}" class="btn btn-primary"><i class="fas fa-plus-circle"></i>Tambah Kategori</a>
                    </div>

                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th width="5%">No</th>
                                    <th>Nama</th>
                                    <th>Jumlah Project</th>
                                    <th width="20%"><i class="fas fa-cog"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data as $key => $dt)
                                    <td>{{$key+1}}</td>
                                    <td>{{$dt->name}}</td>
                                    <td></td>
                                    <td>
                                        <a href="{{ route('category.edit', $dt->id)}}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                                        <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                    </td>
                                @empty
                                    
                                @endforelse
                                <tr>
                                    
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>  
@endsection
