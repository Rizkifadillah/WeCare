<div class="from-group">
    <label for="goal">Target Donasi</label>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <div class="input-group-text">Rp.</div>
        </div>
        <input type="number" name="goal" class="form-control" placeholder="0">
    </div>
</div>


<div class="form-group ">
    <label for="end_date">Batas waktu penggalangan dana</label>
    <input type="date" name="end_date" class="form-control">
</div>
<div class="form-group">
    <button class="btn btn-outline-primary" onclick="stepper.previous()">Sebelumnya</button>
    <button class="btn btn-primary" onclick="stepper.next()">Selanjutnya</button>
</div>