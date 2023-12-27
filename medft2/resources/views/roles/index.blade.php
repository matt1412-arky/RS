@extends('layout.apps')
@section('title','Hak Akses')
@section('content')

<div class="card p-4 m-3" >
<div class="p-4 row">
    <h2>Hak Akses</h2>
</div>
<div class="px-3 row">
<div class="col">
    <div class="input-group">
        <input id="searchData" class="form-control" placeholder="Cari Data" onchange="search()">
        <button class="btn btn-primary mb-0"><i class="fas fa-search" aria-hidden="true"></i></button>
    </div>
</div>
    <div class="col">
        <button class="btn btn-success" onclick="tambah()" style="float: right;">+ Tambah</button>
    </div>
</div>
<table class="table table-dark">
    <thead>
        <tr>
            <th class="sorting sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 127px;" aria-label="Name: activate to sort column descending" aria-sort="ascending">
                NAMA
            </th>
            <th>KODE</th>
            <th>#</th>
        </tr>
    </thead>
    <tbody>
        @foreach($roles as $data)
        <tr>
            <!-- <td>{{$loop->index+1}}</td> -->
            <td>{{$data->name}}</td>
            <td>{{$data->code}}</td>
            <td><button class="btn btn-warning" onclick="edit('{{ $data->id }}')">Ubah</button>
                &nbsp; <button class="btn btn-danger" onclick="hapus('{{ $data->id }}')">Hapus</button></td>
        </tr>
        @endforeach
    </tbody>
</table>

<nav>
    <ul class="pagination justify-content-center">
        <li class="page-item">
            <a class="page-link" href="{{ $roles->previousPageUrl() }}" aria-label="Previous">
                <i class="fa fa-angle-left"></i>
                <span class="sr-only">Previous</span>
            </a>
        </li>
    @for ($i = 1; $i <= $roles->lastPage(); $i++)
            <li class="page-item {{ ($roles->currentPage() == $i) ? 'active' : '' }}">
                <a class="page-link " href="{{ $roles->url($i) }}">{{ $i }}</a>
            </li>
    @endfor
        <li class="page-item">
            <a class="page-link" href="{{ $roles->nextPageUrl() }}" aria-label="Next">
                <i class="fa fa-angle-right"></i>
                <span class="sr-only">Next</span>
            </a>
        </li>
    </ul>
</nav>

<script>

    function tambah(){
        $.ajax({
            url:'/h/hakakses/form',
            type:'GET',
            contentType:'html',
            success:function(role){
                console.log(role);
                $('#mymodal').modal('show');
                $('.modal-title').html('Tambah Hak Akses');
                $('.modal-body').html(role);
                $('.modal-footer').hide();
            }
        }); 
    }

    function edit(id){
        $.ajax({
            url:'/h/hakakses/editform/'+id,
            type:'GET',
            contentType:'html',
            success:function(role){
                console.log(role);
                $('#mymodal').modal('show');
                $('.modal-title').html('Ubah Hak Akses');
                $('.modal-body').html(role);
                $('.modal-footer').hide();
            }
        }); 
    }

    function hapus(id){
        $.ajax({
            url:'/h/hakakses/deleteform/'+id,
            type:'GET',
            contentType:'html',
            success:function(role){
                console.log(role);
                $('#mymodal').modal('show');
                $('.modal-title').html('Hapus !');
                $('.modal-body').html(role);
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

// function search() {
//     var searchText = $('#searchData').val().toLowerCase();

//     $.ajax({
//         url: '/h/hakakses/search',
//         method: 'GET',
//         contentType : 'application/json',
//         data: { searchText: searchText },
//         success: function (data) {
//             $('tbody tr').hide();

//             data.forEach(function (result) {
//                 $('#row_' + result.id).show();
//             });
//         },
//         error: function (error) {
//             console.log(error);
//         }
//     });
// }

</script>

@endsection