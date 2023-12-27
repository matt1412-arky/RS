<form id="specializationForm" method="post" action="/api/spesialisasi/create">
    @csrf
    <div class="container-fluid px-3">
        <div class="row mt-0">
            <h4>Nama Spesialisasi Baru*</h4>
        </div>
        <div class="row mt-2">
            <input name="user_id" id="user_id" hidden>
            <input id="name" name="name" class="form-control" placeholder="contoh: Gizi, Anak ,...">
            <label class="text-danger" id="errorMessage"></label>
        </div>
        <div class="row mt-3">
            <div class="col text-end">
                <button class="btn btn-secondary w-75" type="button" data-bs-toggle="modal">Batal</button>
            </div>
            <div class="col">
                <button class="btn btn-primary w-75" type="button" onclick="checkData()">Tambah</button>
            </div>
        </div>
    </div>
</form>

<script>
    function checkData(){
        let name = $('#name').val()
        switch(true){
            case name === null: return $('#errorMessage').html('*Nama harus diisi'); break;
            case name.trim() === "": return $('#errorMessage').html('*Nama hanya mengandung spasi'); break;
        }
        $.ajax({
            url:'/api/spesialisasi/check/'+name,
            method:'get',
            success:function(response){
                if(response.dataExist){
                    $('#errorMessage').html('*Nama sudah ada')
                } else {
                    submitForm();
                }
            }
        })
        console.log(name);
    }

    function submitForm() {
        var form = document.getElementById("specializationForm");
        form.submit();
    }

    $('#user_id').val(localStorage.getItem('user_id'))
    document.getElementById("specializationForm").addEventListener("keypress", function(event) {
    if (event.key === "Enter") {
        event.preventDefault();
    }
    });
</script>