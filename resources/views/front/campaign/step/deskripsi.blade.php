<div class="form-group">
    <label for="short_description">Ceritakan tentang diri anda, alasan penggalangan dana, dan rencana penggalangan dana</label>
    <textarea name="short_description" id="short_description" rows="3" class="form-control">{{isset($campaign) ? $campaign->short_description : ''}}</textarea>
</div>

<div class="form-group">
    <label for="body">Tulis konten secara lengkap</label>
    <textarea name="body" id="body" rows="3" class="form-control summernote">{{isset($campaign) ? $campaign->body : ''}}</textarea>
</div>


<div class="form-group">
    <label for="note">Tulis ajakan singkat untuk mengajak orang lain berdonasi</label>
    <textarea type="text" name="note" class="form-control" rows="3">{{isset($campaign) ? $campaign->note : ''}}</textarea>
</div>


<div class="form-group">
    <button type="button" class="btn btn-outline-primary" onclick="stepper.previous()">Sebelumnya</button>
    <button type="button" class="btn btn-primary" onclick="stepper.next()">Selanjutnya</button>
</div>

@include('includes.summernote')