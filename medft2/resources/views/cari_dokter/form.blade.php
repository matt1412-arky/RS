
<input type="hidden" id="id">

<form action="/h/cari-dokter/formview" method="get">
    {{ csrf_field() }}
    <input hidden id="user_id" name="user_id">
    <table class="table table-light">
    <tr>
        <td>Lokasi</td>
        <td>
            <select id="selectLocationLevel" onclick="getSelectLocationLevel(this.value)"></select>
            </select>
        </td>
    </tr>
    <tr>
        <td>Nama Dokter</td>
        <td><input type="text" id="name" class="form-control" maxlength="30"></td>
        <span id="nameMessage" class="valid"></span>
    </tr>
    <tr>
        <td>Spesialisasi/Sub-spesialisasi *</td>
        <td>
            <select id="selectLocationLevel" onclick="getSelectLocationLevel(this.value)"></select>
            </select>
        </td>
    </tr>
    <tr>
        <td>Tindakan Medis</td>
        <td>
            <select class="form-select" id="selectLocation">
            </select>
            <span id="varianMessage" class="valid"></span>
        </td>
    </tr>
        <tr>
            <td colspan="2">
                <button type="submit" class="btn btn-primary" style="float:right;">Cari</button>
                <button type="button" onclick="cancel()" class="btn btn-outline-warning"
                    style="margin-left: 180px; margin-right: 180px;">Atur Ulang</button>
            </td>
        </tr>
    </table>
</form>

<script>
    function cancel() {
        $('#mymodal').modal('hide');
    }
    $('#user_id').val(localStorage.getItem('user_id'))
</script>