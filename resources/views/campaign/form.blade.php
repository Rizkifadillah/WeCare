<x-modal size='modal-xl' data-backdrop="static" data-keyboard="false">
    <x-slot name="title">
        Tambah
    </x-slot>

    @method('post')
    
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="title">Judul</label>
                <input type="text" name="title" class="form-control">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">    
                <label for="categories">Kategori</label>
                <select  class="select2 form-control" name="categories[]" id="categories" multiple>
                    {{-- <option disable selected>Pilih Salah Satu</option> --}}
                    @foreach ($category as $key => $item)
                        <option value="{{ $key }}">{{$item}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="short_description">Deskripsi Singkat</label>
        <textarea name="short_description" id="short_description" rows="3" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <label for="body">Konten</label>
        <textarea name="body" id="body" rows="3" class="form-control summernote"></textarea>
    </div>

    <div class="row">
        <div class="form-group col-lg-6">
            <label for="publish_date">Tanggal Publish</label>
            <input type="date" name="publish_date" class="form-control">
        </div>

        <div class="form-group col-lg-6">
            <label for="status">Status</label>
            <select type="date" name="status" class="custom-select form-control">
                <option disabled selected>Pilih salah satu</option>
                <option value="public">Public</option>
                <option value="archived">Archived</option>
            </select>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="from-group">
                <label for="goal">Goal</label>
                <input type="text" name="goal" class="form-control" onkeyup="format_uang(this)">
            </div>
        </div>
        <div class="form-group col-lg-6">
            <label for="end_date">Tanggal Selesai</label>
            <input type="date" name="end_date" class="form-control">
        </div>
    </div>

   

    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="note">Tulis ajakan singkat untuk mengajak orang lain berdonasi</label>
                <textarea type="text" name="note" class="form-control" rows="3"></textarea>
            </div>
        </div>
       
        <div class="col-lg-6">
            <div class="from-group custom-control-radio-input">
                <label for="receiver">Penerima</label>
                <div class="custom-control custom-radio">
                    <input type="radio" name="receiver" class="custom-control-input" value="Saya Sendiri" id="saya">
                    <label for="saya" class="custom-control-label font-weight-normal">Saya Sendiri</label>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" name="receiver" class="custom-control-input" value="Keluarga / Kerabat" id="keluarga">
                    <label for="keluarga" class="custom-control-label font-weight-normal">Keluarga / Kerabat</label>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" name="receiver" class="custom-control-input" value="Organisasi / Lembaga" id="organisasi">
                    <label for="organisasi" class="custom-control-label font-weight-normal">Organisasi / Lembaga</label>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" name="receiver" class="custom-control-input" value="Lainnya" id="lainnya">
                    <label for="lainnya" class="custom-control-label font-weight-normal">Lainnya</label>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="path_image">Gambar</label>
                <div class="custom-file">
                    <input type="file" name="path_image" class="custom-file-input" id="path_image" 
                    onchange="preview('.preview-path-image', this.files[0])">
                    <label for="path_image" class="custom-file-label">Choose file</label>
                </div>
                <img src="" alt="" class="img-thumbnail preview-path-image m-2" style="display: none;">
            </div>
        </div>
    </div>

     

    <x-slot name="footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="submitForm(this.form)">Save</button>
    </x-slot>
</x-modal>