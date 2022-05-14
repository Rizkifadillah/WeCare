@extends('layouts.app')

@section('title', 'Kontak')
    {{-- @endsection --}}

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item" active>Kontak</li>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">

        <x-card>
            <x-table>
                <x-slot name="thead">
                    <tr>
                        <th width="5%">No</th>
                        <th>Nama</th>
                        <th>Tlp</th>
                        <th>Subjek</th>
                        <th>Pesan</th>
                        <th>Tgl Kirim</th>
                        <th width="20%"><i class="fas fa-cog"></i></th>
                    </tr>
                </x-slot>
            </x-table>
            {{-- <x-pagination-table :model="$data"/> --}}
        </x-card>
    </div>
</div>

@endsection

<x-toast />
@include('includes.datatable')
{{-- @include('includes.datepicker') --}}



@push('scripts')
    <script>
        let modal = '#modal-form';
        let table;

        table = $('.table').DataTable({
            processing: true,
            autoWidth: false,
            ajax: {
                url: '{{ route('contact.data', ['date' => request('date')]) }}'
            },
            columns: [
                {data: 'DT_RowIndex', searchable: false, sortable: false},
                {data: 'name'},
                {data: 'phone', searchable: false},
                {data: 'subject'},
                {data: 'message',sortable: false},
                {data: 'created_at',sortable: false},
                {data: 'action',searchable: false, sortable: false},

            ]
        });

        function deleteData(url) {
            if(confirm('Yakin data akan dihapus?')){
                $.post(url, {
                    '_method': 'delete'
                })
                .done(response => {
                    table.ajax.reload();
                })
                .fail(errors => {
                    showAlert('Tidak dapat menghapus data');
                    return;
                });
            }
        }


    </script>
@endpush