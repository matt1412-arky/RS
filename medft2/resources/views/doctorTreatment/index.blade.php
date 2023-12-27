<div class="p-5">
    <div class="row" style="min-height:50vh">
    <span>
        @if($treatment)
        @foreach($treatment as $data)
            <button class="btn btn-rounded py-1 px-3 shadow border mb-2" style="width: fit-content;" onclick="hapus('{{$data->id}}')">{{$data->name}} | X</button>
        @endforeach
        @else
        <h5>Tambah Tindakan Medis</h5>
        @endif
    </span>
    </div>
    <div class="row justify-content-end w-100">
        <button class="btn btn-rounded btn-primary p-3 px-3 text-center" style="width: fit-content" onclick="tambah()"><i class="fas fa-plus fa-2x"></i></button>
    </div>
</div>

<script>
    const user_id = localStorage.getItem('user_id')
    var baseUrl = window.location.href; // Get the current URL

    function hapus(id){
        $.ajax({
            url: '/h/tindakan/'+ doctor_id +'/form/delete/'+id,
            contentType:'html',
            success:function(deleteForm){
                $('#mymodal').modal('show');
                $('.modal-title').html('Hapus Tindakan Medis');
                $('.modal-body').html(deleteForm);
                $('.modal-footer').hide();
            }
        }); 
    }
    function tambah(){
        $.ajax({
            url: '/h/tindakan/'+doctor_id+'/form',
            type:'GET',
            contentType:'html',
            success:function(tambahForm){
                $('#mymodal').modal('show');
                $('.modal-title').html('Tambah Tindakan Medis');
                $('.modal-body').html(tambahForm);
                $('.modal-footer').hide();
            }
        }); 
    }
</script>
