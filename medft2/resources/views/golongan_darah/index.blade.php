@extends('layout.apps')
@section('title', 'Golongan Darah')
@section('content')

<div class="input-group w-25">
            <input id="searchData" class="form-control" placeholder="cari data" onchange="handleSearch()">
            <button class="btn btn-primary mb-0"><i class="fas fa-search" aria-hidden="true"></i></button>
        </div>
<button type="button" onclick="openForm()" class="btn btn-primary" style="float:right;">Tambah Data</button>

    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th>KODE</th>
                <th>DESKRIPSI</th>
                <th colspan="2">#</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($blodd as $data)
                <tr>
                    <td class="px-4">{{ $data->code }}</td>
                    <td class="center">{{ $data->description }}</td>
                    <td><button onclick="openEdit('{{ $data->id }}')" class="btn btn-primary">U</button>
                        <button onclick="openHapus('{{ $data->id }}')" class="btn btn-danger">H</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <script>
        function handleSearch() {
            var searchText = $('#searchData').val().toLowerCase();

            $('tbody tr').each(function() {
                var rowData = $(this).text().toLowerCase();

                if (rowData.includes(searchText)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        }

        function openForm() {
            $.ajax({
                url: '/h/goldar/form',
                type: 'get',
                contentType: 'html',
                success: function(goldarForm) {
                    console.log(goldarForm);
                    $('#mymodal').modal('show');
                    $('.modal-title').html('Tambah Golongan Darah');
                    $('.modal-body').html(goldarForm);
                    $('.modal-footer').hide();

                }
            });
        }

        function openEdit(id) {
            $.ajax({
                url: '/h/goldar/editForm/' + id,
                type: 'get',
                contentType: 'html',
                success: function(goldarForm) {
                    console.log(goldarForm);
                    $('#mymodal').modal('show');
                    $('.modal-title').html('Ubah Golongan Darah');
                    $('.modal-body').html(goldarForm);
                    $('.modal-footer').hide();
                }
            });
        }

        function openHapus(id) {
            $.ajax({
                url: '/h/goldar/deleteform/' + id,
                type: 'GET',
                contentType: 'html',
                success: function(goldarForm) {
                    console.log(goldarForm);
                    $('#mymodal').modal('show');
                    $('.modal-title').html('Hapus !');
                    $('.modal-body').html(goldarForm);
                    $('.modal-footer').hide();
                }
            });
        }
    </script>
@endsection