<input type="hidden" id="id">
@foreach($pasien as $data)
<form action="/h/pasien/delete/{{$data->id}}" method="post">
{{ csrf_field() }}
    <table class="table">
        <tr>
            <td>Anda yakin ingin menghapus pasien ?</td>
        </tr>
        <tr>
            <td>{{ $data->customer->biodata->fullname }}</td>
        </tr>
        <tr>
            <td>Riwayat medis pasien akan tetap tersimpan,namun Anda tidak
                <br> dapat lagi membuat janji dokter / chat online untuk pasien ini</td>
        </tr>
        <tr>
            <td colspan="2" align="right">
                <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Batal</button>
                &nbsp;&nbsp;&nbsp;
                <button type="submit" class="btn btn-primary" >Hapus</button>
            </td>
        </tr>
    </table>
</form>
@endforeach
<script>
    // let user_id = localStorage.getItem('user_id');
    // document.getElementById('create_by').value = user_id;
    // document.getElementById('update_by').value = user_id;    
</script>

