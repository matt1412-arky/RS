@extends('layout.apps')
@section('title', 'Doktor')
@section('content')

<div class="row w-100">
    <div class="col me-3" style="max-width: 300px;">
        <div class="row card mb-3 p-3">
            <div class="p-0" style="width: 100%; max-width: 500px; margin: auto; position: relative; overflow: hidden;">
                <a>
                    <div style="padding-bottom: 100%; position: relative;">
                        <img src="https://cdn.epicstream.com/images/ncavvykf/epicstream/cc63dfd72735a912e64ec9279fb18ba23c06a21d-1177x589.png"
                            style="width: 100%; height: 100%; position: absolute; top: 0; left: 0; object-fit:cover" class="rounded-circle border border-primary border-5">
                        <label style="float: right;" hidden><i class="fas fa-pencil-alt fa-2x"></i></label>
                    </div>
                </a>
            </div>
        </div>
        <div class="row card p-3">
            <h5 class="border-bottom border-2 border-primary">Tentang Saya</h5>
            <ul class="list-group">
                <li></li>
            </ul>
        </div>
    </div>
    <div class="card col">
        @yield('doctorAccount')
    </div>
</div>


@endsection