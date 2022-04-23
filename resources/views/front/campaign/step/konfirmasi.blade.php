<div class="from-group custom-control-radio-input">
    <label for="receiver">Galang dana tersebut diperuntukan kepada?</label>
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
        <input type="radio" name="receiver" class="custom-control-input" value="Lainnyas" id="lainnya">
        <label for="lainnya" class="custom-control-label font-weight-normal">Lainnya</label>
    </div>
</div>

<div class="alert alert-primary">
    Saya setuju dengan <strong>Syarat dan Ketentuan</strong> donasi di wecare <strong>WeCare</strong>
</div>

<div class="form-group">
    <button class="btn btn-outline-primary" onclick="stepper.previous()">Sebelumnya</button>
    <button class="btn btn-primary" onclick="submitForm()">Selesai</button>
</div>