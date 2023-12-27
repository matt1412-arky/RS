<div class=" w-100 p-3" style="min-width: fit-content;">
<form method="get" action="/h/find/med/find">
    <div class="row mb-3">
        <label for="medCat" class="fs-6 px-4">Kategori</label>
        <select class="form-select" id="medCat" name="medCat" onchange="deleteRequired()" required>
                <option value="">--Pilih--</option>
            @foreach($medCat as $data)
                <option value="{{$data->id}}">{{$data->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="row mb-3">
        <label for="keyword" class="fs-6 px-4">Kata Kunci</label>
        <input id="keyword" name="keyword" placeholder="Nama Obat atau Indikasi" class="form-control" onchange="deleteRequired()" required>
    </div>
    <div class="row mb-3 ps-5 pt-1">
        <div class="form-check">
            <input class="form-check-input" value="1" type="radio" name="medSeg" id="medSeg1"checked>
            <label class="form-check-label" for="medSeg1">
                Hanya Pilih Obat Generik
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" value="0" name="medSeg" id="medSeg2">
            <label class="form-check-label" for="medSeg2">
                Cari Semua Obat (termasuk obat keras)
            </label>
        </div>
    </div>
    <div class="row mb-3 align-items-center">
        <label for="price" class="fs-6 px-4">Harga</label>
        <div class="col input-group px-0">
            <label class="input-group-text m-0">Rp.</label>
            <input id="price" name="minPrice" type="number" placeholder="0" class="form-control">
        </div>
        <div class="col-2 text-center p-0"><label>sampai</label></div>
        <div class="col input-group px-0">
            <label class="input-group-text m-0">Rp.</label>
            <input id="price" name="maxPrice" type="number" max="100000000" placeholder="100000000" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col text-end"><button type="reset" class="btn btn-secondary w-25" style="min-width: fit-content;">Reset</button></div>
        <div class="col"><button type="submit" class="btn btn-primary w-25" style="min-width: fit-content;">Cari</button></div>
    </div>
</form>
</div>

<script>
    function deleteRequired(){
        let keyword = $('#keyword').val()
        let medCat = $('#medCat').val()
        if(keyword || medCat){
            $('#medCat').attr('required', false)
            $('#keyword').attr('required', false)
        } else {
            $('#medCat').attr('required', true)
            $('#keyword').attr('required', true)
        }
    }
</script>