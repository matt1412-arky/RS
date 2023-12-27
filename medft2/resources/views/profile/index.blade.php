@extends('layout.account')
@section('title', 'beranda')
@section('profile-content')

        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Profil</button>
                <!-- <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Alamat</button>
                <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Pembayaran</button> -->
                <button class="nav-link" id="nav-pembayaran" data-bs-toggle="tab" data-bs-target="#nav-2-pembayaran" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Tarik Saldo</button>
            </div>
            </nav>
            <input value="{{$user->cust_id}}" id="customer_id" hidden>
            <div class="tab-content border border-top-0 rounded-bottom p-5" id="nav-tabContent" style="height: fit-content;">
                <div class="tab-pane fade show active " id="profile" role="tabpanel" aria-labelledby="nav-home-tab">
                    @include('profile.profile')
                </div>
                <!-- <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                </div> -->
                <div class="tab-pane fade" id="nav-2-pembayaran" role="tabpanel" aria-labelledby="nav-pembayaran">
                    <a id="pembayaran">
                    </a>
                </div>
            </div>
        </div>

<script>
    var id = $('#customer_id').val()
    $.ajax({
        url:'/h/tarik-saldo/'+id,
        method:'get',
        success: function(response){
            $('#pembayaran').html(response)
        }, error:function(e){
            console.log(e);
        }
    })
</script>
@endsection