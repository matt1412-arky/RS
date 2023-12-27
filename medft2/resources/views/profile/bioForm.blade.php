<form id="editProfileForm" method="post" action="/api/profil/edit/{{$user->id}}">
    @csrf
    <div class="container-fluid px-3">
        <input name="user_id" id="user_id" hidden>
        <div class="row mt-2">
            <h4>Nama Lengkap</h4>
        </div>
        <div class="row mt-1">
            <input type="text" id="name" name="name" value="{{$user->biodata->fullname}}" class="form-control">
            <label class="text-danger" id="nameErrorMessage"></label>
        </div>
        <div class="row mt-2">
            <span><h4>Tanggal Lahir</h4><label>(Bulan / Tanggal / Tahun)</label></span>
        </div>
        <div class="row mt-1">
            @if($user->customer)
                <input id="dob" type="date" name="dob" value="{{$user->customer->dob}}"  class="form-control" required>
            @else
                <input id="dob" type="date" name="dob" class="form-control" required>
            @endif
            <label class="text-danger" id="dobErrorMessage"></label>
        </div>
        <div class="row mt-2">
            <h4>Nomor Handphone</h4>
        </div>
        <div class="row mt-1 mb-2">
            <div class="input-group p-0">
                <label class="input-group-text m-0" for="mobile_phone">+62</label>
                <input id="mobile_phone" type="number" maxlength="15" name="mobile_phone" value="{{$user->biodata->mobile_phone}}"  class="form-control" required>
            </div>
            <label class="text-danger" id="phoneErrorMessage"></label>
        </div>
        <div class="row mt-4">
            <div class="col text-end">
                <button class="btn btn-secondary w-75" type="button" data-bs-toggle="modal">Batal</button>
            </div>
            <div class="col">
                <button class="btn btn-primary w-75" type="button" onclick="checkData()">Ubah</button>
            </div>
        </div>
    </div>
</form>

<script>
    $('#user_id').val(localStorage.getItem('user_id'))
    function checkData(){
        $('#nameErrorMessage').html('')
        $('#dobErrorMessage').html('')
        let name = $('#name').val()
        let id = localStorage.getItem('user_id')
        let dob = $('#dob').val()
        let mobile_phone = $('#mobile_phone').val()
        
        let currentTime = new Date()
        currentTime.setDate(currentTime.getDate() + 1);
        let dobDate = new Date(dob);
        dobDate.setDate(dobDate.getDate() + 1);

        
        switch(true){
            case name === null: return $('#nameErrorMessage').html('*Nama harus diisi'); break;
            case name.trim() === "": return $('#nameErrorMessage').html('*Nama harus diisi'); break;
            case dobDate >= currentTime: return $('#dobErrorMessage').html('*Tanggal belum tersedia'); break;
        }

        $.ajax({
            url:'/api/profil/check/'+mobile_phone+'/'+id,
            method:'post',
            success:function(response){
                console.log(response);
                if(response.dataExists){
                    return $('#phoneErrorMessage').html('*Nomor HP sudah terdaftar');
                } else {
                    Swal.fire({
                        title: "Data Diubah",
                        icon: "success"
                    }).then(() => {
                        submitForm();
                    })
                }
            }
        })
    }

    function submitForm() {
        var form = document.getElementById("editProfileForm");
        form.submit();
    }

    var maxDate = new Date()
    maxDate.setDate(currentDate.getDate() + 1);
    dob.max = maxDate.toLocaleDateString('fr-ca');

    document.getElementById("specializationForm").addEventListener("keypress", function(event) {
    if (event.key === "Enter") {
        event.preventDefault();
    }
    });
</script>