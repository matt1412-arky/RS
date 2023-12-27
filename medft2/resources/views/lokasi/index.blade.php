@extends('layout.apps')
@section('title', 'Lokasi')
@section('content')

<div class="row">
    <div class="col">
    <div class="input-group">
            <input id="searchData" class="form-control" placeholder="cari data" onchange="handleSearch()">
            <button class="btn btn-primary mb-0"><i class="fas fa-search" aria-hidden="true"></i></button>
        </div>
    </div>
    <div class="col">
    <select id="pilihlevel" class="form-control" placeholder="Level Lokasi"></select>
    </div>
    <div class="col">
    <button type="button" onclick="openForm()" class="btn btn-primary" style="float:right;">+Tambah Data</button>

    </div>

</div>

<table class="table table-dark table-striped">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Level Lokasi</th>
            <th>Wilayah</th>
            <th colspan="2">#</th>
        </tr>
    </thead>
    <tbody>
        @php
        $counter = 1;
        @endphp

        @foreach($lokasi as $data)
        @if($data->parent_id != 0)
        <tr data-level="{{ $data->location_level_id }}">
                <td>{{$data->name}}</td>
                <td>{{$data->level->name}}</td>
                <td>
                    @if(is_numeric($data->parent_id))
                    @php
                    $parentLocation = App\Models\m_location::find($data->parent_id);
                    echo $parentLocation ? $parentLocation->name : 'N/A';
                    @endphp
                    @else
                    N/A
                    @endif
                </td>
                <td width="5%"> <button class="btn btn-warning" onclick="edit('{{$data->id}}')"><svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"/></svg></button> </td>
                <td> <button class="btn btn-danger" onclick="del('{{$data->id}}')"><svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg></button> </td>
            </tr>
            @endif
            @endforeach
    </tbody>
    </table>
    <!-- <p>{{$lokasi -> links()}}</p> -->
    <div style="text-align: right;">
        <p>
            Page: {{ $lokasi->currentPage() }},
            Showing: {{ $lokasi->perPage() }},
            Total: {{ $lokasi->total() }}
        </p>
        <button class="btn btn-danger" onclick="javascript:window.open('{{ $lokasi->previousPageUrl() }}','_self')">Previous</button>
        <button class="btn btn-success" onclick="javascript:window.open('{{ $lokasi->nextPageUrl() }}','_self')">Next</button>
    </div>
<script>

    getLocationLevelMenu();

        function getLocationLevel() {
            $.ajax({
                url: 'http://localhost:8000/api/lokasilevel',
                type: 'get',
                contentType: 'html',
                success: function(locationlevel) {
                    var selectData = '';
                    for (i = 0; i < locationlevel.length; i++) {
                        selectData += `<option value="${locationlevel[i].id}">${locationlevel[i].name}</option>`
                    }

                    $('#selectLocationLevel').html(selectData);
                }
            });
        }

        function getLocationLevelMenu() {
            $.ajax({
                url: 'http://localhost:8000/api/lokasilevel',
                type: 'get',
                contentType: 'html',
                success: function(locationlevel) {
                    var selectData = '<option>Level Lokasi</option>';
                    for (i = 0; i < locationlevel.length; i++) {
                        selectData += `<option value="${locationlevel[i].id}">${locationlevel[i].name}</option>`
                    }

                    $('#pilihlevel').html(selectData);
                }
            });
        }

        function filterByLevel() {
            var selectedLevel = document.getElementById("pilihlevel").value;
            var rows = document.getElementById("locationData").getElementsByTagName("tr");

            for (var i = 0; i < rows.length; i++) {
                var levelCell = rows[i].getAttribute("data-level");
                rows[i].style.display = (selectedLevel == "All" || levelCell == selectedLevel) ? "" : "none";
            }
        }

        // Tambahkan event listener untuk memanggil fungsi filter ketika nilai dropdown berubah
        document.getElementById("pilihlevel").addEventListener("change", filterByLevel);

        function getLocation() {
            $.ajax({
                url: 'http://127.0.0.1:8000/api/lokasi',
                type: 'get',
                contentType: 'html',
                success: function(location) {
                    var selectData = '';
                    for (i = 0; i < location.length; i++) {
                        selectData += `<option value="${location[i].parent_id}">${location[i].name}</option>`
                    }

                    $('#selectLocation').html(selectData);
                }
            });
        }

        function getSelectLocationLevel(id) {
            $.ajax({
                url: 'http://localhost:8000/api/lokasi/getbylocationlevel/' + id,
                type: 'get',
                contentType: 'html',
                success: function(location) {
                    var selectData = '';
                    for (i = 0; i < location.length; i++) {
                        selectData += `<option value="${location[i].parent_id}">${location[i].name}</option>`
                    }

                    $('#selectLocation').html(selectData);
                }
            });
        }

        function simpan() {
            var name = $('#name').val();
            var parent_id = $('#selectLocation').val();
            var location_level_id = $('#selectLocationLevel').val();
            var str = '';

            // Validasi untuk memeriksa apakah nama sudah ada atau belum
            $.ajax({
                url: 'http://localhost:8000/api/checkName', // Gantilah dengan endpoint yang sesuai
                type: 'post',
                data: JSON.stringify({
                    name: name
                }),
                contentType: 'application/json',
                success: function(response) {
                    if (response.exists) {
                        str = '<p>*Nama sudah dipakai</p>'

                        $('#reqname').html(str)
                        return;
                    } else {
                        // Jika nama unik, kirim permintaan AJAX untuk menyimpan data
                        const role = {
                            name: name,
                            parent_id: parent_id,
                            location_level_id: location_level_id,
                            created_by: 1,
                            created_on: "2023-11-29 03:05:35"
                        };

                        console.log('heee', role);

                        $.ajax({
                            url: 'http://localhost:8000/api/lokasi',
                            type: 'post',
                            data: JSON.stringify(role),
                            contentType: 'application/json',
                            success: function(role) {
                                $('#myModal').modal('hide');
                                location.reload();
                            }
                        });
                    }
                }
            });
        }


        function edit($id_location) {
            $.ajax({
                url: '/lokasi/form',
                type: 'get',
                contentType: 'html',
                success: function(locationForm) {
                    console.log(locationForm);
                    $('#myModal').modal('show');
                    $('.modal-title').html("Edit Location");
                    $('.modal-body').html(locationForm);
                    $('#id').val($id_location);
                    $('#btnUpdate').val($id_location);
                    $('#btnSimpan').hide();
                    $('#btnUpdate').show();
                    $('#btnDelete').hide();
                    getLocationLevel();

                    $.ajax({
                        url: 'http://127.0.0.1:8000/api/lokasi/' + $id_location,
                        type: 'get',
                        contentType: 'application/json',
                        success: function(location) {
                            $('#name').val(location.name);
                            $('#selectLocationLevel').val(location.location_level_id);
                            $('#selectLocation').val(location.parent_id);
                        }

                    });
                }
            });
        }


        function update($id_location) {
            var name = $('#name').val();
            var parent_id = $('#selectLocation').val();
            var location_level_id = $('#selectLocationLevel').val();

            const role = {
                name: name,
                parent_id: parent_id,
                location_level_id: location_level_id,
                created_by: 1,
                created_on: "2023-11-29 03:05:35"
            };

            $.ajax({
                url: 'http://127.0.0.1:8000/api/lokasi/edit/' + $id_location,
                type: 'put',
                data: JSON.stringify(role),
                contentType: 'application/json',
                success: function(updatedLocation) {
                    console.log(updatedLocation);
                    location.reload(true);
                },
                error: function(error) {
                    console.log("Error during update:", error);
                }
            });
        }

        function del(id_location) {
            $.ajax({
                url: 'http://127.0.0.1:8000/api/lokasi/' + id_location,
                type: 'get',
                contentType: 'application/json',
                success: function(location) {
                    var str = `
                <span>Anda akan menghapus kategori ${location.name} ?</span><br><br>
                <span><button class="btn btn-danger" onclick="hapus(${id_location}, '${location.parent_id}', '${location.location_level_id}')">Hapus</button></span><br>
            `;
                    $('#myModal').modal('show');
                    $('.modal-title').html("Hapus Role");
                    $('.modal-body').html(str);
                }
            });
        }

        function hapus(id_location, locationParentId, locationLevelId) {
            // console.log(id_location);
            // var data = {
            //     is_delete: true,
            //     parent_id: locationParentId,
            //     location_level_id: locationLevelId
            // };

            $.ajax({
                url: 'http://127.0.0.1:8000/api/lokasi/delete/' + id_location,
                type: 'get',
                // contentType: 'application/json',
                // data: JSON.stringify(data),
                success: function(response) {
                    console.log(response);
                },
                error: function(xhr, status, error) {
                    var errorMessage = JSON.parse(xhr.responseText).message;
                    alert(errorMessage);
                }
            });
        }

     function handleSearch() {
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

    function openForm(){
        $.ajax({
            url:'/lokasi/form',
            type:'get',
            contentType:'html',
            success:function(lokasiForm) {
                console.log(lokasiForm);
                $('#mymodal').modal('show');
                $('.modal-title').html('Tambah Lokasi');
                $('.modal-body').html(lokasiForm);
                $('.modal-footer').hide();
                getLocationLevel();
                getLocation();

            }   
        });
    }

    function openEdit(id){
        $.ajax({
            url:'/lokasi/editForm/'+id,
            type:'get',
            contentType:'html',
            success:function(lokasiForm) {
                console.log(lokasiForm);
                $('#mymodal').modal('show');
                $('.modal-title').html('Ubah Lokasi');
                $('.modal-body').html(lokasiForm);
                $('.modal-footer').hide();
            }   
        });
    }

    function openHapus(id){
        $.ajax({
            url:'/lokasi/deleteform/'+id,
            type:'GET',
            contentType:'html',
            success:function(lokasiForm){
                console.log(lokasiForm);
                $('#mymodal').modal('show');
                $('.modal-title').html('Hapus !');
                $('.modal-body').html(lokasiForm);
                $('.modal-footer').hide();
            }
        }); 
    }

</script>

@endsection