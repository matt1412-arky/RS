<form id="deleteForm" method="post" action="/api/tindakan/hapus">
    <div class="row mb-1 text-center p-4 mb-3">
        <input hidden id="user_id" name="user_id">
        <input hidden id="treatment_id" name="treatment_id" value="{{$treatment->id}}">
        <a>Anda akan menghapus <b>{{$treatment->name}}!</b></a>
    </div>
    <div class="row text-center">
        <div class="col text-end">
            <button type="button" data-bs-dismiss="modal" class="btn btn-secondary">Batal</button>
        </div>
        <div class="col text-start">
            <button type="submit" class="btn btn-danger">Hapus</button>
        </div>
    </div>
</form>

<script>
    $('#user_id').val(localStorage.getItem('user_id'))
</script>