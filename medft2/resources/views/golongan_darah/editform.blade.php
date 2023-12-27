<input type="hidden" id="id">

@foreach ($blodd as $data)
    <form action="/h/goldar/editSave/{{ $data->id }}" method="post">
        {{ csrf_field() }}
        <input hidden id="user_id" name="user_id">
        <table class="table table-dark">
            <tr>
                <td>KODE</td>
                <td>
                    <input type="text" name="code" class="form-control" value="{{ $data->code }}">
                </td>
            </tr>
            <tr>
                <td>DESKRIPSI</td>
                <td>
                    <input type="text" name="description" class="form-control" value="{{ $data->description }}">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit" class="btn btn-success" style="float:right;">Simpan</button>
                    <button type="button" onclick="cancel()" class="btn btn-warning"
                        style="margin-left: 180px; margin-right: 180px;">Batal</button>
                </td>
            </tr>
        </table>
    </form>
@endforeach

<script>
    function cancel() {
        $('#mymodal').modal('hide');
    }

    $('#user_id').val(localStorage.getItem('user_id'))

    // digunakan untuk memanggil localstorage dengan javascript
    // let user_id = localStorage.getItem('user_id');
    // document.getElementById('create_by').value = user_id;
    // document.getElementById('update_by').value = user_id;
</script>
