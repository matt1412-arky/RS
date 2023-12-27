<form id="specializationForm" method="post" action="/api/spesialisasi/create">
    <input name="user_id" hidden id="user_id">
    <div id="formBody">
        <div class="row mb-1">
            <label for="name" class="fs-6 px-4">Nama</label>
        </div>
        <div class="row px-3 mb-4">
            <input id="name" name="name" class="form-control" required>
        </div>
    </div>
    <div class="row text-end">
        <div class="col">
        </div>
        <div class="col">
            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Batal</button>
            <button id="btnSubmit" class="btn btn-primary" type="submit">Tambah</button>
            <button id="btnDelete" class="btn btn-danger" type="submit" hidden>Hapus</button>
    </div>
</form>

<script>
    $('#user_id').val(localStorage.getItem('user_id'))
    function cancel(){
        $('#mymodal').modal('hide')
    }
</script>