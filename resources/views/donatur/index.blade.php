@extends('layouts.app')

@section('title', 'Donatur')
    {{-- @endsection --}}

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item" active>Donatur</li>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">

        <x-card>
            <x-slot name="header">
                <button onclick="addForm('{{ route('donatur.store')}}')" class="btn btn-info elevation-2"><i class="fas fa-plus-circle"></i>Tambah Donatur</button>
            </x-slot>

            <x-table>
                <x-slot name="thead">
                    <tr>
                        <th width="5%">No</th>
                        <th ></th>
                        <th>Nama</th>
                        <th>Tlp</th>
                        <th style="white-space: nowrap;">Total Project</th>
                        <th style="white-space: nowrap;">Total Donasi</th>
                        <th style="white-space: nowrap;">Tgl Gabung</th>
                        <th width="20%"><i class="fas fa-cog"></i></th>
                    </tr>
                </x-slot>
            </x-table>
            {{-- <x-pagination-table :model="$data"/> --}}
        </x-card>
    </div>
</div>

@include('donatur.form')

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
                url: '{{ route('donatur.data', ['email' => request('email')]) }}'
            },
            columns: [
                {data: 'DT_RowIndex', searchable: false, sortable: false},
                {data: 'path_image', searchable: false, sortable: false},
                {data: 'name'},
                {data: 'phone', searchable: false},
                {data: 'campaigns_count', searchable: false, sortable: false},
                {data: 'donations_sum_nominal',sortable: false},
                {data: 'created_at',sortable: false},
                {data: 'action',searchable: false, sortable: false},

            ]
        });

        $('[name=status2]').on('change', function(){
            table.ajax.reload();
        });

        $('.datepicker').on('change.date', function(){
            console.log('ok');
            table.ajax.reload();
        });


        function addForm(url, title ='Tambah') {
            $(modal).modal('show');
            $(`${modal} .modal-title`).text(title);
            $(`${modal} form`).attr('action', url);
            $(`${modal} [name=_method]`).val('post');

            resetForm(`${modal} form`);
        }

        function editForm(url, title = 'Edit'){
            $.get(url)
                .done(response => {
                    $(modal).modal('show');
                    $(`${modal} .modal-title`).text(title);
                    $(`${modal} form`).attr('action', url);
                    $(`${modal} [name=_method]`).val('put');
                    
                    resetForm(`${modal} form`);
                    loopForm(response.data);
                    
                    let selectedCategories = [];
                    response.data.categories.forEach(item => {
                        selectedCategories.push(item.id);
                    })
                    
                    $('#categories')
                        .val(selectedCategories)
                        .trigger('change');
                    
                })
                .fail(errors => {
                    alert('Tidak Dapat Menampilkan Data');
                    return;
                });
        }

        function submitForm(originalForm){
            $.post({
                url:$(originalForm).attr('action'),
                data: new FormData(originalForm),
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false
            })
            .done(response => {
                $(modal).modal('hide');
                showAlert(response.message, 'success');
                table.ajax.reload();
            })
            .fail(errors => {
                if(errors.status == 422){
                    loopErrors(errors.responseJSON.errors);
                    return;
                }
                showAlert(errors.responseJSON.message, 'danger');
            });
        }

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

        // function resetForm(selector){
        //     $(selector)[0].reset();

        //     $('.select2').trigger('change');
        //     $('.form-control, .custom-select, .note-editor, .custom-radio, [type=radio], [type=checkbox], [type=file], .custom-checkbox, .select2').removeClass('is-invalid');
        //     $('.invalid-feedback').remove();
        // }

        // function loopForm(originalForm) {
        //     for (field in originalForm) {
        //         if($(`[name=${field}]`).attr('type') != 'file'){
        //             if($(`[name=${field}]`).hasClass('summernote')) {
        //                 $(`[name=${field}]`).summernote('code', originalForm[field]);
        //             }else if($(`[name=${field}]`).attr('type') == 'radio'){
        //                 $(`[name=receiver]`).filter(`[value="${originalForm[field]}"]`).prop('checked', true);
        //             }else{
        //                 $(`[name=${field}]`).val(originalForm[field]);
        //             }
        //             $('select').trigger('change');
        //         }else{
        //             $(`.preview-${field}`)
        //                 .attr('src', originalForm[field])
        //                 .show();
        //         }
        //     }
        // }

        // function loopErrors(errors){
        //     $('.invalid-feedback').remove();

        //     if(errors == undefined){
        //         return;
        //     }

        //     for (error in errors) {
        //         $(`[name=${error}]`).addClass('is-invalid');

        //         if ($(`[name=${error}`).hasClass('select2')) {
        //             $(`<span class="error invalid-feedback">${errors[error][0]}</span>`)
        //                 .insertAfter($(`[name=${error}]`).next());
        //         } else if($(`[name=${error}`).hasClass('summernote')){
        //             $('.note-editor').addClass('is-invalid');
        //             $(`<span class="error invalid-feedback">${errors[error][0]}</span>`)
        //                 .insertAfter($(`[name=${error}]`).next());
        //         } else if($(`[name=${error}`).hasClass('custom-control-input')){
        //             $(`<span class="error invalid-feedback">${errors[error][0]}</span>`)
        //                 .insertAfter($(`[name=${error}]`).next());
        //         }else{
        //             if ($(`[name=${error}]`).length == 0) {
        //                 console.log('select2');
        //                 $(`[name="${error}[]"]`).addClass('is-invalid');
        //                 $(`<span class="error invalid-feedback">${errors[error][0]}</span>`)
        //                 .insertAfter($(`[name="${error}[]"]`).next());
        //             }else{
        //                 $(`<span class="error invalid-feedback">${errors[error][0]}</span>`)
        //                 .insertAfter($(`[name=${error}]`));
        //             }
        //         }

        //     }
        // }

        // function showAlert(message, type){

        //     let title = '';
        //     switch(type) {
        //         case 'success':
        //             title = 'Success';
        //             break;
        //         case 'danger':
        //             title = 'Failed';
        //             break;
        //         default:
        //             break;
        //     }

        //     $(document).Toasts('create', {
        //         class: `bg-${type}`,
        //         title:  `${type}`,
        //         body: '{{ session('message') }}'
        //     });

        //     setTimeout(() => {
        //         $('.toasts-top-right').remove();
        //     }, 2000);
        // }

    </script>
@endpush