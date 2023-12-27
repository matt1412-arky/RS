<form id="tambahForm" method="post" action="/api/tindakan/tambah">
    <input hidden id="doctor_id" name="doctor_id" value="{{$doctor_id}}">
    <div class="row mb-1">
        <label for="name" class="fs-6 px-4">Tindakan</label>
        <input id="user_id" name="user_id" hidden>
    </div>
    <div class="row px-3 mb-4">
        <div class="input-group">
        <input id="name" name="name" class="form-control" required>
        </div>
        <label class="text-danger" id="cekNameMessage"></label>
    </div>
    <div class="row">
        <div class="col text-end">
        </div>
        <div class="col">
            <button type="button" data-bs-dismiss="modal" class="btn btn-secondary">Batal</button>
            <button type="button" onclick="checkName()" id="btnSubmission" class="btn btn-primary" >Tambah</button>
        </div>
    </div>
</form>

<script>
    console.log(doctor_id);
    $('#user_id').val(localStorage.getItem('user_id'))
    function checkName(){
        name = $('#name').val()
        switch(true){
                case name === null: return $('#cekNameMessage').html('*Nama harus diisi'); break;
                case name.trim() === "": return $('#cekNameMessage').html('*Nama harus diisi'); break;
            }
        
        $.ajax({
            url:'/h/tindakan/checkName/'+name+'/'+doctor_id,
            method:'get',
            success:function(response){
                if(response.dataExist){
                    $('#cekNameMessage').html('*Sudah Ada')
                } else {
                    submitForm()
                }
            }, error: function(e){
                console.log(e);
            }
        })
    }
    function submitForm() {
        // Serialize the form data
        var formData = $('#tambahForm').serialize();

        $.ajax({
            url: "/api/tindakan/tambah",
            method: 'post',
            data: formData,
            success: function (response) {
                // Handle the success response as needed
                console.log(response);
                location.reload();
            },
            error: function (error) {
                // Handle the error response as needed
                console.error(error);
            }
        });
    }

    function cancel(){
        $('#mymodal').modal('hide')
    }
</script>

