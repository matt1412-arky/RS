<input type="hidden" id="id">

<form action="/h/pasien/create" method="post">
{{ csrf_field() }}
    <input type="hidden" name="user_id" id="user_id">
    <table class="table">
        <tr>
            <td>Nama Lengkap *<input type="text" name="fullname" class="form-control" required></td>
        </tr>
        <tr>
            <td colspan="3">Tanggal Lahir *<input type="date" id="selectDob" name="dob" class="form-control" required></td>
        </tr>
        <tr>
                <td><label for="gender">Jenis Kelamin : *</label></td>
                <td>
                    <input type="radio" id="male" name="gender" value="L" required>
                    <label for="male">Laki-laki</label>
                </td>
                <td>
                    <input type="radio" id="female" name="gender" value="P" required>
                    <label for="female">Perempuan</label>
                </td>
           
        </tr>
        <tr><td colspan="3"><label for="goldar">Golongan Darah / Rhesus</label></tr></td>
        <tr>
                <td><select name="blood" id="selectGoldar" >
                <option value="" disabled selected aria-placeholder="true">Pilih Golongan Darah</option>
                    @foreach($blood as $data)
                        <option value="{{$data->id}}">{{$data->code}}</option>
                    @endforeach
                </select></td>
                <td>
                    <input type="radio" id="rh+" name="rhesusType" value="plus">
                    <label for="rh+">Rh +</label>
                </td>
                <td>
                    <input type="radio" id="rh-" name="rhesusType" value="minus">
                    <label for="rh-">Rh -</label>
                </td>
        </tr>
        <tr>
            <td>Tinggi Badan<input type="text" name="height" class="form-control" ></td>
        </tr>
        <tr>
            <td>Berat Badan<input type="text" name="weight" class="form-control" ></td>
        </tr>
        <tr>
            <td>
                <label>Relasi *</label>
                <select id="customer_relation_id" name="relasi" required>
                <option value="" disabled selected aria-placeholder="true">--Choose--</option>
                    @foreach($relation as $data)
                        <option  value="{{$data->id}}">{{$data->name}}</option>
                    @endforeach
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="right">
                <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Batal</button>
                &nbsp;&nbsp;&nbsp;
                <button type="submit" class="btn btn-primary">Simpan</button>
            </td>
        </tr>
    </table>
</form>

<script>
    let user_id = localStorage.getItem('user_id');
    document.getElementById('user_id').value = user_id;

    
</script>

