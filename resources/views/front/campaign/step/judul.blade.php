
<div class="form-group">
    <label>Kategori Apa judul untuk penggalangan dana ini?</label>
    <select class="select2 select2-hidden-accessible" name="categories[]" id="categories" multiple="" data-placeholder="Pilih Kategori" style="width: 100%;" data-select2-id="7" tabindex="-1" aria-hidden="true">
        @foreach ($category as $key=>$item)
            <option value="{{$key}}" 
                {{ isset($campaign) && in_array($key, $campaign->category_campaign->pluck('id')->toArray()) ? 'selected' : ''}}
            >{{$item}}</option>
        @endforeach
        {{-- <option data-select2-id="33">Alabama</option>
        <option data-select2-id="34">Alaska</option>
        <option data-select2-id="35">California</option>
        <option data-select2-id="36">Delaware</option>
        <option data-select2-id="37">Tennessee</option>
        <option data-select2-id="38">Texas</option>
        <option data-select2-id="39">Washington</option> --}}
    </select>
</div>

<div class="form-group">
    <label for="title">Apa judul untuk penggalangan dana ini?</label>
    <input type="text" name="title" class="form-control" value="{{ isset($campaign) ? $campaign->title : ''}}" placeholder="Contoh: bantu Kafi melawan koreng">
</div>
<div class="form-group">
    <button type="button" class="btn btn-primary" onclick="stepper.next()">Selanjutnya</button>
</div>