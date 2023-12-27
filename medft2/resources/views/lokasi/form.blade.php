<input type="hidden" id="id">

    {{ csrf_field() }}
    <table class="table table-dark">
    <tr>
        <td>Level Lokasi *</td>
        <td>
        <select id="selectLocationLevel" onclick="getSelectLocationLevel(this.value)"></select>
            </select>
        </td>
    </tr>
    <tr>
        <td>Wilayah</td>
        <td>
            <select class="form-select" id="selectLocation">
            </select>
            <span id="varianMessage" class="valid"></span>
        </td>
    </tr>
    <tr>
        <td>Name *</td>
        <td><input type="text" id="name" class="form-control" maxlength="30"></td>
        <span id="nameMessage" class="valid"></span>
    </tr>
        <tr>
            <td colspan="2"> 
                <button type="submit" class="btn btn-primary" style="float:right;" >Simpan</button>
                <button type="button" onclick="cancel()" class="btn btn-warning" style="margin-left: 180px; margin-right: 180px;">Batal</button>
            </td>
        </tr>
    </table>
</form>

<script>
    function cancel() {
        $('#mymodal').modal('hide');
    }
</script>