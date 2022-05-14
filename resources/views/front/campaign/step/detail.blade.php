<div class="from-group">
    <label for="goal">Target Donasi</label>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <div class="input-group-text">Rp.</div>
        </div>
        <input type="text" name="goal" value="{{ isset($campaign) ? format_uang($campaign->goal) : 0}}" class="form-control" onkeyup="format_uang(this)">
    </div>
</div>

<div class="form-group ">
    <label for="publish_date">Tanggal Publish</label>
    <input type="date" class="form-control" id="publish_date"  name="publish_date"
        min="{{ now() }}" max="2025-12-20" value=" {{ date('Y-m-d', strtotime(isset($campaign) ? $campaign->publish_date : '')) }}">
</div>

<div class="form-group ">
    <label for="end_date">Batas waktu penggalangan dana</label>
    <input type="date" class="form-control" id="end_date" name="end_date" 
        min="{{ now() }}" max="2025-12-20" value=" {{ date('Y-m-d', strtotime(isset($campaign) ? $campaign->end_date : '')) }}" >
</div>



<div class="form-group">
    <button type="button" class="btn btn-outline-primary" onclick="stepper.previous()">Sebelumnya</button>
    <button type="button" class="btn btn-primary" onclick="stepper.next()">Selanjutnya</button>
</div>