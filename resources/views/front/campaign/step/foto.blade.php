<div class="form-group">
    <label for="path_image">Pilih salah satu foto untuk penggalangan danamu</label>
    <div class="custom-file">
        <input type="file" name="path_image" class="custom-file-input" id="path_image" value="{{isset($campaign) ? $campaign->path_image : ''}}"
        onchange="preview('.preview-path-image', this.files[0])">
        <label for="path_image" class="custom-file-label">Choose file</label>
    </div>
    <small class="text-muted d-block">Format foto harus: (jpg, png, jpeg)</small>
    {{-- @dd(Storage::disk('public')->exists(isset($campaign) ? $campaign->path_image : '')) --}}
    @if (Storage::disk('public')->exists(isset($campaign) ? $campaign->path_image : ''))
        <img src="{{Storage::disk('public')->url(isset($campaign) ? $campaign->path_image : '')}}" alt="" class="img-thumbnail w-100">
    @else
        <img src="" alt="" class="img-thumbnail preview-path-image m-2 w-50" style="display: none;">
        {{-- <img src="{{asset('assets/backend/dist/img/photo1.png')}}" alt="" class="w-100"> --}}
    @endif
</div>

<div class="form-group">
    <button type="button" class="btn btn-outline-primary" onclick="stepper.previous()">Sebelumnya</button>
    <button type="button" class="btn btn-primary" onclick="stepper.next()">Selanjutnya</button>
</div>