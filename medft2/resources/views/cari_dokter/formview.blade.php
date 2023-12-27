@extends('layout.apps')
@section('content')

<div class="card w-100 p-5" style="min-width: fit-content;">
    <div class="row">
        <div class="col">
            <label class="fs-6">Hasil pencarian dari kata kunci: <b id="keywords"></b></label>
        </div>
        <div class="col">
            <button class="float-end btn btn-primary px-5 py-3">Ulangi Pencarian</button>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="container border m-1" style="min-width: 400px; max-width:49%">
            <div class="row">
                <div class="col">
                    <label class="fs-5 mb-0">title</label>
                    <p>Price</p>
                    <p>Desc</p>
                </div>
                <div class="col overflow-hidden" style="max-width: 35%;">
                    <img src="https://images.k24klik.com/product/apotek_online_k24klik_201811160137524677_povidone-onemed-30ml.jpeg" class=" w-100">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <button class="btn btn-outline-primary w-100">Lihat info lebih banyak </button>
                </div>
                <div class="col" style="max-width: 35%;">
                    <button class="btn btn-outline-primary w-75">Chat</button>
                    <button class="btn btn-primary w-75">Buat Janji</button>
                </div>
            </div>
        </div>
        <div class="container border m-1" style="min-width: 400px; max-width:49%">
            <div class="row">
                <div class="col">
                    <label class="fs-5 mb-0">title</label>
                    <p>Price</p>
                    <p>Desc</p>
                </div>
                <div class="col overflow-hidden" style="max-width: 35%;">
                    <img src="https://images.k24klik.com/product/apotek_online_k24klik_201811160137524677_povidone-onemed-30ml.jpeg" class=" w-100">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <button class="btn btn-outline-primary w-100">Lihat info lebih banyak </button>
                </div>
                <div class="col" style="max-width: 35%;">
                    <button class="btn btn-outline-primary w-75">Chat</button>
                    <button class="btn btn-primary w-75">Buat Janji</button>
                </div>
            </div>
        </div>
        <div class="container border m-1" style="min-width: 400px; max-width:49%">
            <div class="row">
                <div class="col">
                    <label class="fs-5 mb-0">title</label>
                    <p>Price</p>
                    <p>Desc</p>
                </div>
                <div class="col overflow-hidden" style="max-width: 35%;">
                    <img src="https://images.k24klik.com/product/apotek_online_k24klik_201811160137524677_povidone-onemed-30ml.jpeg" class=" w-100">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <button class="btn btn-outline-primary w-100">Lihat info lebih banyak </button>
                </div>
                <div class="col" style="max-width: 35%;">
                    <button class="btn btn-outline-primary w-75">Chat</button>
                    <button class="btn btn-primary w-75">Buat Janji</button>
                </div>
            </div>
        </div>
        <div class="container border m-1" style="min-width: 400px; max-width:49%">
            <div class="row">
                <div class="col">
                    <label class="fs-5 mb-0">title</label>
                    <p>Price</p>
                    <p>Desc</p>
                </div>
                <div class="col overflow-hidden" style="max-width: 35%;">
                    <img src="https://images.k24klik.com/product/apotek_online_k24klik_201811160137524677_povidone-onemed-30ml.jpeg" class=" w-100">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <button class="btn btn-outline-primary w-100">Lihat info lebih banyak </button>
                </div>
                <div class="col" style="max-width: 35%;">
                    <button class="btn btn-outline-primary w-75">Chat</button>
                    <button class="btn btn-primary w-75">Buat Janji</button>
                </div>
            </div>
        </div>
    </div>
    {{-- <nav>
    <ul class="pagination justify-content-center">
        <li class="page-item">
            <a class="page-link" href="{{ $specialization->previousPageUrl() }}" aria-label="Previous">
                <i class="fa fa-angle-left"></i>
                <span class="sr-only">Previous</span>
            </a>
        </li>
    @for ($i = 1; $i <= $specialization->lastPage(); $i++)
            <li class="page-item {{ ($specialization->currentPage() == $i) ? 'active' : '' }}">
                <a class="page-link " href="{{ $specialization->url($i) }}">{{ $i }}</a>
            </li>
    @endfor
        <li class="page-item">
            <a class="page-link" href="{{ $specialization->nextPageUrl() }}" aria-label="Next">
                <i class="fa fa-angle-right"></i>
                <span class="sr-only">Next</span>
            </a>
        </li>
    </ul>
</nav> --}}
</div>

@endsection