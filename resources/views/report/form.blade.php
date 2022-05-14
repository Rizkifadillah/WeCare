<x-modal size='modal-md' method="get" >
    <x-slot name="title">
        Tambah
    </x-slot>
{{--  --}}
    {{-- @method('post') --}}

    <div class="form-group mb-3">
        <label for="start">Tanggal Awal</label>
        <input type="date" class="form-control " id="start" name="start" >
    </div>
    <div class="form-group mb-3">
        <label for="end">Tanggal Akhir</label>
        <input type="date" class="form-control " id="end" name="end" >
    </div>

    <x-slot name="footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button class="btn btn-primary">Save</button>
    </x-slot>
</x-modal>