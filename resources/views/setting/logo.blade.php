<form action="{{ route('setting.update', $setting->id)}}?pills=logo" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')

    <x-card>

        <div class="row justify-content-center">
            <div class="col-lg-4">
                <div class="text-center">
                    <h5 class="card-title">Favicons</h5>
                    <img src="{{ url(auth()->user()->path_image  ?? '')}}" alt="" class="img-thumbnail preview-path_image" width="200">
                </div>
                <div class="form-group mt-3">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="path_image" id="path_image" onchange="preview('.preview-path_image', this.files[0])">
                        <label for="path_image" class="custom-file-label">Choose File</label>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="text-center">
                    <h5 class="card-title">Header</h5>
                    <img src="{{ url(auth()->user()->path_image_header  ?? '')}}" alt="" class="img-thumbnail preview-path_image_header" width="200">
                </div>
                <div class="form-group mt-3">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="path_image_header" id="path_image_header" onchange="preview('.preview-path_image_header', this.files[0])">
                        <label for="path_image_header" class="custom-file-label">Choose File</label>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="text-center">
                    <h5 class="card-title">Footer</h5>
                    <img src="{{ url(auth()->user()->path_image_footer  ?? '')}}" alt="" class="img-thumbnail preview-path_image_footer" width="200">
                </div>
                <div class="form-group mt-3">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="path_image_footer" id="path_image_footer" onchange="preview('.preview-path_image_footer', this.files[0])">
                        <label for="path_image_footer" class="custom-file-label">Choose File</label>
                    </div>
                </div>
            </div>
        </div>     

        <x-slot name="footer">
            <button type="reset" class="btn btn-dark">Reset</button>
            <button class="btn btn-primary">Simpan</button>
        </x-slot>
    </x-card>
</form>