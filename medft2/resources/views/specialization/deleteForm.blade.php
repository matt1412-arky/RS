<form id="specializationForm" method="post" action="/api/spesialisasi/delete/{{$deletespecialization->id}}/">
    @csrf
    <div class="container-fluid px-3">
        <div class="row mt-2 mb-4 text-center">
            <input name="user_id" id="user_id" hidden>
            <a class="fs-4">Anda akan menghapus <b>{{$deletespecialization->name}}</b> !</a>
        </div>
        <div class="row mt-3">
            <div class="col text-end">
                <button class="btn btn-secondary w-75" type="button" data-bs-toggle="modal">Batal</button>
            </div>
            <div class="col">
                <button class="btn btn-danger w-75" type="submit">Hapus</button>
            </div>
        </div>
    </div>
</form>

<script>
    $('#user_id').val(localStorage.getItem('user_id'))
    document.getElementById("specializationForm").addEventListener("keypress", function(event) {
    if (event.key === "Enter") {
        event.preventDefault();
    }
    });
</script>