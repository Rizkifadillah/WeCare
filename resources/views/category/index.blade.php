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

        <x-card>
            <x-slot name="header">
                <a href="{{ route('category.create')}}" class="btn btn-primary bg-info elevation-2"><i class="fas fa-plus-circle"></i>Tambah Kategori</a>
            </x-slot>

            <form action="" class="d-flex justify-content-between">
                <x-dropdown-table/>
                <x-search-table/>
            </form>
            <x-table>
                <x-slot name="thead">
                    <tr>
                        <th width="5%">No</th>
                        <th>Nama</th>
                        <th>Jumlah Project</th>
                        <th width="20%"><i class="fas fa-cog"></i></th>
                    </tr>
                </x-slot>
                @forelse ($data as $key => $dt)
                <tr>
                    <td>
                        <x-number-table :key="$key" :model="$data"/>    
                    </td>
                    <td>{{$dt->name}}</td>
                    <td>0</td>
                    <td>
                        <form action="{{ route('category.destroy', $dt->id)}}" method="post">
                            <a href="{{ route('category.edit', $dt->id)}}" class="btn btn-link text-info"><i class="fas fa-edit"></i></a>
                            @csrf
                            @method('delete')
                            <button class="btn btn-link text-danger" onclick="return confirm('Yakin Ingin Menghapus Data?')"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>   
                @empty
                    
                @endforelse
            </x-table>

            <x-pagination-table :model="$data"/>
        </x-card>

        
    </div>
</div>

<x-toast />

@endsection


    
