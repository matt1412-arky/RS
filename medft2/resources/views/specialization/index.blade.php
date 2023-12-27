@extends('layout.apps')
@section('title', 'Spesialisasi')
@section('content')

<div class="card w-100 p-5">
    <h1 class="ps-3">Spesialisasi</h1>
    <div class="row w-100 my-3">
        <div class="col">
            <div class="input-group w-75">
                <input id="searchKeyword" placeholder="Cari Spesialisasi" class="form-control fs-6">
                <button class="btn btn-primary m-0" onclick="find()"><i class="fas fa-search fa-lg"></i></button>
            </div>
        </div>
        <div class="col text-end">
            <button class="btn btn-success px-3 fs-6" onclick="addDataForm()"><i class="fas fa-plus fa-lg"></i> | Tambah Data</button>
        </div>
    </div>
    <div class="container-fluid border rounded shadow pt-3">
        <table class="table table-hover align-middle table-striped">
            <thead class="fw-bold fs-4">
                    <th>Nama Spesialisasi</th>
                    <th class="text-center">#</th>
            </thead>
            <tbody>
                @forEach($specialization as $data)
                <tr class="py-3">
                    <td class="fs-5 ps-5">{{$data->name}}</td>
                    <td class="text-center" style="padding-bottom:0;">
                        <button class="btn btn-warning p-3 me-3" onclick="editDataForm('{{$data->id}}')"><i class="fas fa-pen fa-lg"></i></button>
                        <button class="btn btn-danger p-3" onclick="deleteDataForm('{{$data->id}}')"><i class="fas fa-trash fa-lg"></i></button>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2">
                        <nav aria-label="Page navigation" class="pt-3">
                            <ul class="pagination" style="justify-content: center;">
                                @if ($specialization->onFirstPage())
                                    <li class="page-item disabled" hidden>
                                        <span class="page-link" aria-hidden="true">&laquo;</span>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $specialization->previousPageUrl() }}" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                @endif

                                @foreach ($specialization->getUrlRange(1, $specialization->lastPage()) as $page => $url)
                                    <li class=" page-item {{ $page == $specialization->currentPage() ? 'active' : '' }}">
                                        <a class="page-link fs-5 p-2" href="{{ $url }}">{{ $page }}</a>
                                    </li>
                                @endforeach

                                @if ($specialization->hasMorePages())
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $specialization->nextPageUrl() }}" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                @else
                                    <li class="page-item disabled" hidden>
                                        <span class="page-link" aria-hidden="true">&raquo;</span>
                                    </li>
                                @endif
                            </ul>
                        </nav>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

<script>
    function addDataForm(){
        $.ajax({
            url:'/h/spesialisasi/form/add',
            method:'get',
            contentType:'html',
            success:function(response){
                $('#mymodal').modal('show')
                $('.modal-header').show()
                $('.modal-title').html('Tambah Data Spesialisasi')
                $('.modal-body').html(response)
                $('.modal-footer').hide()
            }
        })
    }

    function editDataForm(id){
        $.ajax({
            url:'/h/spesialisasi/form/edit/'+id,
            method:'get',
            contentType:'html',
            success:function(response){
                $('#mymodal').modal('show')
                $('.modal-header').show()
                $('.modal-title').html('Ubah Nama Spesialisasi')
                $('.modal-body').html(response)
                $('.modal-footer').hide()
            }
        })
    }

    function deleteDataForm(id){
        $.ajax({
            url:'/h/spesialisasi/form/delete/'+id,
            method:'get',
            contentType:'html',
            success:function(response){
                $('#mymodal').modal('show')
                $('.modal-header').show()
                $('.modal-title').html('Hapus Nama Spesialisasi')
                $('.modal-body').html(response)
                $('.modal-footer').hide()
            }
        })
    }

    function find(){
        let name = $('#searchKeyword').val()
        console.log(name);
        if(name){
            window.location.href = '/h/spesialisasi/cari/'+name
            return
        }
        window.location.href = '/h/spesialisasi'
        return
    }
</script>

@endsection