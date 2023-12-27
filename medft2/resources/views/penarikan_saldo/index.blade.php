@extends('layout.account')
@section('profile-content')
<div class="container-fluid w-100">
    <div class="row">
        <div class="col border me-3" style="min-height:70vh">
            <label>Saldo saat ini : Rp. {{$saldo->balance}}</label><br>
            <div class="col p-3">
                @foreach($nominal as $data)
                <button type="button" class="btn btn-primary m-1" style="width: fit-content;">{{$data->nominal}}</button>
                @endforeach

                <button type="button" class="btn btn-primary m-1" style="width: fit-content;" onclick="openForm()">Nominal Lain</button>


            </div>
        </div>
        <div class="col border">
            <div class="row" style="min-height:70vh">
             
            </div>
            <div class="row border-top pt-3">
                <div class="col">
                    <button type="button" disabled onclick="cancel()" class="btn btn-warning w-100">Cancel</button>
                </div>
                <div class="col">
                    <button type="submit" disabled class="btn btn-primary w-100">Ok</button>
                </div>

            </div>
        </div>
    </div>

</div>
<script>
    function openForm() {
        let id = localStorage.getItem('user_id') // digunakan pada saat user sudah login untuk mengambil id nya
        $.ajax({
            url: '/h/tarik-saldo/'+id+'/form',
            type: 'get',
            contentType: 'html',
            success: function(goldarForm) {
                console.log(goldarForm);
                $('#mymodal').modal('show');
                $('.modal-title').html('Isi Nominal Lain');
                $('.modal-body').html(goldarForm);
                $('.modal-footer').hide();

            }
        });
    }

    function cancel() {
        $('#mymodal').modal('hide');
    }
    $('#user_id').val(localStorage.getItem('user_id'))
</script>
@endsection