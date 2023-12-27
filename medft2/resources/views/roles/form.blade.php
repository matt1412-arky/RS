<input type="hidden" id="id">

<form action="/h/hakakses/create" method="post">
{{ csrf_field() }}

    <table class="table">
        <tr>
            <td>Nama *
                <input type="text" name="name" class="form-control" required>
            </td>
        </tr>
        <tr>
            <td>Kode *<input type="text" name="code" class="form-control" required></td>
        </tr>
        <tr>
            <td colspan="2" align="right">
                <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Batal</button>
                &nbsp;&nbsp;&nbsp;
                <button type="submit" class="btn btn-primary" >Simpan</button>
            </td>
        </tr>
    </table>
</form>

<script>
    // let user_id = localStorage.getItem('user_id');
    // document.getElementById('create_by').value = user_id;
    // document.getElementById('update_by').value = user_id;
    
</script>

