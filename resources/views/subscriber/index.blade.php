@extends('layouts.app')

@section('title', 'Subscriber')
    {{-- @endsection --}}

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item" active>Subscriber</li>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">

        <x-card>
            <x-table>
                <x-slot name="thead">
                    <tr>
                        <th width="5%">No</th>
                        <th>Email</th>
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
                url: '{{ route('subscriber.data') }}'
            },
            columns: [
                {data: 'DT_RowIndex', searchable: false, sortable: false},
                {data: 'email'},
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