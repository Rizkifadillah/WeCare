<div class="from-group custom-control-radio-input">
    <label for="receiver">Galang dana tersebut diperuntukan kepada?</label>
    <div class="custom-control custom-radio">
        <input type="radio" name="receiver" class="custom-control-input" value="Saya Sendiri" id="saya"
            {{ isset($campaign) && $campaign->receiver == 'Saya Sendiri' ? 'checked' : ''}}
        >
        <label for="saya" class="custom-control-label font-weight-normal">Saya Sendiri</label>
    </div>
    <div class="custom-control custom-radio">
        <input type="radio" name="receiver" class="custom-control-input" value="Keluarga / Kerabat" id="keluarga"
            {{ isset($campaign) && $campaign->receiver == 'Keluarga / Kerabat' ? 'checked' : ''}}
        >
        <label for="keluarga" class="custom-control-label font-weight-normal">Keluarga / Kerabat</label>
    </div>
    <div class="custom-control custom-radio">
        <input type="radio" name="receiver" class="custom-control-input" value="Organisasi / Lembaga" id="organisasi"
            {{ isset($campaign) && $campaign->receiver == 'Organisasi / Lembaga' ? 'checked' : ''}}
        >
        <label for="organisasi" class="custom-control-label font-weight-normal">Organisasi / Lembaga</label>
    </div>
    <div class="custom-control custom-radio">
        <input type="radio" name="receiver" class="custom-control-input" value="Lainnya" id="lainnya"
            {{ isset($campaign) && $campaign->receiver == 'Lainnya' ? 'checked' : ''}}
        >
        <label for="lainnya" class="custom-control-label font-weight-normal">Lainnya</label>
    </div>
</div>

<div class="alert alert-primary">
    Saya setuju dengan <strong>Syarat dan Ketentuan</strong> donasi di {{ $setting->company_name}} <strong>WeCare</strong>
</div>

<div class="form-group">
    <button type="button" class="btn btn-outline-primary" onclick="stepper.previous()">Sebelumnya</button>
    <button class="btn btn-primary">Selesai</button>
</div>