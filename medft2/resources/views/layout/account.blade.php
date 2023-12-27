@extends('layout.apps')
@section('title', 'beranda')
@section('content')

<div class="card px-5 pb-4">
    <div class="d-flex flex-row align-items-stretch">
        <div class="d-flex text-center flex-column bg-primary rounded-bottom mb-4" style="min-width: fit-content; width:30%">
            <div class="container py-5 w-100" >
                <div class="p-0" style="width: 100%; max-width: 500px; margin: auto; position: relative; overflow: hidden;">
                <a href="/h/pasien">
                    <div style="padding-bottom: 100%; position: relative;">
                        <img src="https://cdn.epicstream.com/images/ncavvykf/epicstream/cc63dfd72735a912e64ec9279fb18ba23c06a21d-1177x589.png"
                            style="width: 100%; height: 100%; position: absolute; top: 0; left: 0; object-fit:cover" class="rounded-circle border border-5">
                        <label style="float: right;"><i class="fas fa-pencil-alt"></i></label>
                    </div>
                </a>
                </div>
                
            <b>
                <h5 class="mb-0 text-light fw-bold">Member</h5>
                <h6 class="text-light fw-bold">Since 2023</h6>
            </b>
        </div>
            <div class="container-fluid  w-100 text-start mb-5 align-self-end">
            
                <ul class="list-group">
                
                    <a class="list-group-item list-group-item-action" href="/pasien">Pasien</a>
                    <li class="list-group-item list-group-item-action">Pembelian Obat</li>
                    <li class="list-group-item list-group-item-action">Rencana Kedatangan</li></li>
                    <li class="list-group-item list-group-item-action">Riwayat Chat Dokter</li>
                </ul>
            </div>
        </div>
        <div class="d-flex w-100 flex-column p-4">
        @yield('profile-content')
        </div>
    </div>
</div>


@endsection