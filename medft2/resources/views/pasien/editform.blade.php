<input type="hidden" id="id">

<form action="/h/pasien/editsave/{{$pasien[0]->id}}" method="post">
{{ csrf_field() }}
    <input type="hidden" name="user_id" id="user_id">
    @foreach($pasien as $data)
    <table class="table">
        <tr>
            <td>Nama Lengkap *<input type="text" name="fullname" class="form-control" value="{{ $data->customer->biodata->fullname }}" required></td>
        </tr>
        <tr>
            <td colspan="3">Tanggal Lahir *<input type="date" id="selectDob" name="dob" class="form-control" value="{{ $data->customer->dob }}" required></td>
        </tr>
        <tr>
                <td><label for="gender">Jenis Kelamin:</label></td>
                <td>
                    <input type="radio" id="male" name="gender" value="L" @if($data->customer->gender == 'L') checked @endif>
                    <label for="male">Laki-laki</label>
                </td>
                <td>
                    <input type="radio" id="female" name="gender" value="P" @if($data->customer->rhesus_type == 'P') checked @endif>
                    <label for="female">Perempuan</label>
                </td>
           
        </tr>
        <tr><td colspan="3"><label for="goldar">Golongan Darah / Rhesus</label></tr></td>
        <tr>
                <td><select name="blood" id="selectGoldar" >
                    @foreach($blood as $datablood)
                        <option value="{{$datablood->id}}" @if($datablood->id == $data->customer->blood_group_id) selected @endif>
                            {{ $datablood->code }}
                        </option>
                    @endforeach
                </select></td>
                <td>
                    <input type="radio" id="rh+" name="rhesusType" value="rh+" @if($data->customer->rhesus_type == 'rh+') checked @endif>
                    <label for="rh+">Rh +</label>
                </td>
                <td>
                    <input type="radio" id="rh-" name="rhesusType" value="rh-" @if($data->customer->rhesus_type == 'rh-') checked @endif>
                    <label for="rh-">Rh -</label>
                </td>
        </tr>
        <tr>
            <td>Tinggi Badan<input type="text" name="height" class="form-control" value="{{$data->customer->height}}"></td>
        </tr>
        <tr>
            <td>Berat Badan<input type="text" name="weight" class="form-control" value="{{$data->customer->weight}}"></td>
        </tr>
        <tr>
            <td>
                <label>Relasi *</label>
                <select id="customer_relation_id" name="relasi" >
                    @foreach($relation as $dataRelasi)
                        <option  value="{{$dataRelasi->id}}" @if($dataRelasi->id == $data->customer_relation_id) selected @endif>
                            {{$dataRelasi->name}}
                        </option>
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
    @endforeach
</form>

<script>
    // let user_id = localStorage.getItem('user_id');
    // document.getElementById('user_id').value = user_id;
</script>

