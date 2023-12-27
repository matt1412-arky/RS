<input type="hidden" id="id">

<form action="/h/goldar/create" method="post">
    {{ csrf_field() }}
    <input hidden id="user_id" name="user_id">
    <table class="table table-dark">
        <tr>
            <td>KODE *</td>
            <td>
                <input type="text" name="code" class="form-control" required>
            </td>
        </tr>
        <tr>
            <td>DESKRIPSI</td>
            <td>
                <input type="text" name="description" class="form-control">
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <button type="submit" class="btn btn-primary" style="float:right;">Simpan</button>
                <button type="button" onclick="cancel()" class="btn btn-warning"
                    style="margin-left: 180px; margin-right: 180px;">Batal</button>
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
