<input type="hidden" id="id">
@foreach($roles as $data)
<form action="/h/hakakses/delete/{{$data->id}}" method="post">
{{ csrf_field() }}
    <table class="table">
        <tr>
            <td>Anda akan menghapus Role Admin ?</td>
        </tr>
        <tr>
            <td colspan="2" align="right">
                <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Tidak</button>
                &nbsp;&nbsp;&nbsp;
                <button type="submit" class="btn btn-primary" >Ya</button>
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

