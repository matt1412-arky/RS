@extends('layout.account')
@section('title','Transaction :: Daftar Pasien')
@section('profile-content')

<div class="card p-4 m-3" >
<div class="p-4 row">
    <h2>Daftar Pasien</h2>
</div>
<div class="px-3 row">
    <div class="col">
        <div class="input-group">
            <input id="searchData" class="form-control" placeholder="Cari Data" onchange="search()">
            <button class="btn btn-primary mb-0"><i class="fas fa-search" aria-hidden="true"></i></button>
        </div>
    </div>
    <div><br></div>
    <div class="col">
        <button class="btn btn-danger" id="deleteAll" onclick="hapusAll()">Hapus Semua</button>
        <button class="btn btn-success" onclick="tambah()" style="float: right;">+ Tambah</button>
    </div>
</div>
<table id="tablePasien" class="table table-light; form-control" >
    @foreach($pasien as $data)
    <tr>
        <td><input type="checkbox" name="deletePasien" value="{{ $data->id }}" id="" class="checkbox_ids"></td>
        <td>{{ $data->customer->biodata->fullname }}</td>
        <td>{{ $data->customerRelation->name }} ,
            @if ($data->customer->dob)
            @php
                $dob = new DateTime($data->customer->dob);
                $age = now()->diff($dob)->y;
            @endphp
            @else
                <p>No date of birth available</p>
            @endif
        {{ $age }} Tahun</td>
        <td><button class="btn btn-warning" onclick="edit('{{ $data->id }}')">Ubah</button>
                &nbsp; <button class="btn btn-danger" onclick="hapus('{{ $data->id }}')">Hapus</button></td>
    </tr>
    @endforeach
</table>



<script>

    function tambah(){
        $.ajax({
            url:'/h/pasien/form',
            type:'GET',
            contentType:'html',
            success:function(pasien){
                console.log(pasien);
                $('#mymodal').modal('show');
                $('.modal-title').html('Tambah Pasien');
                $('.modal-body').html(pasien);
                $('.modal-footer').hide();
            }
        }); 
    }

    function edit(id){
        $.ajax({
            url:'/h/pasien/editform/'+id,
            type:'GET',
            contentType:'html',
            success:function(pasien){
                console.log(pasien);
                $('#mymodal').modal('show');
                $('.modal-title').html('Ubah Data Pasien');
                $('.modal-body').html(pasien);
                $('.modal-footer').hide();
            }
        }); 
    }

    function hapus(id){
        $.ajax({
            url:'/h/pasien/deleteform/'+id,
            type:'GET',
            contentType:'html',
            success:function(pasien){
                console.log(pasien);
                $('#mymodal').modal('show');
                $('.modal-title').html('Hapus Pasien');
                $('.modal-body').html(pasien);
                $('.modal-footer').hide();
            }
        }); 
    }

    function search() {
        var searchText = $('#searchData').val().toLowerCase();

        $('tbody tr').each(function () {
            var rowData = $(this).text().toLowerCase();

            if (rowData.includes(searchText)) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    }

    // $(function(e){
    //     $("#deleteAll").click(function(e){
    //         e.preventDefault();
    //         var all_ids = [];
    //         $('input:checkbox[name=ids]:checked').each(function()){
    //             all_ids.push($(this))
    //         }
    //     });
    // });

    function hapusAll(){

        var pasien = document.getElementsByName('deletePasien');
        for(i=0; i<pasien.length; i++){
            if(pasien[i].checked){
                console.log(pasien[i].value);
                $.ajax({
                    url:'http://localhost:8000/api/pasien/deleteapi/' + pasien[i].value,
                    type:'GET',
                    contentType:'application/json',
                    success:function(data){
                        location.reload(1);
                    }
                })
            }
        }
        
    }
</script>

@endsection