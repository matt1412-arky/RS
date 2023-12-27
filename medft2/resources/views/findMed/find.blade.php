@extends('layout.apps')
@section('content')

<div class="card w-100 p-5" style="min-width: fit-content;" id="findView">
    <div class="row">
        <div class="col">
            <label class="fs-6">Hasil pencarian dari kata kunci: <b>{{$message}}</b></label>
        </div>
        <div class="col">
            <button class="float-end btn btn-primary px-5 py-3" onclick="find()">Ulangi Pencarian</button>
        </div>
    </div>
    <div class="row align-items-center">
        @foreach($medItem as $data)
        <div class="container border p-3 pb-0 m-1" style="min-width: 400px; max-width:49%">
            <div class="row">
                <div class="col overflow-hidden mb-2" style="height:150px;">
                    <label class="fs-5 mb-0 overflow-x text-nowrap" style="height: 35px;">{{ $data->name }}</label>
                    <p class="m-0 float-end"  style="font-size: small;">{{ $data->medical_item_category->name }}|{{$data->medical_item_segmentation->name}}</p>
                    <p class="ps-3 m-0 pb-0" style="font-size: small;">Per {{$data->packaging}}</p>
                    <p class="ps-3 mb-3" style="font-size:small;">Rp.{{ number_format($data->price_min, 0, ',', '.') }} - Rp.{{ number_format($data->price_max, 0, ',', '.') }}</p>
                    <p>{{$data->indication}}</p>
                </div>
                <div class="col overflow-hidden align-item-center p-1" style="max-width: 35%;height:150px">
                    <img src="{{$data->image_path}}" class="img-fluid h-100 w-100 object-fit-cover">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <button id="btn{{$data->id}}" onclick="addToCart('{{$data->id}}', '{{$data->price_max}}')" class="btn btn-primary w-100">Tambah Keranjang</button>
                    <div class="row p-2" id="btnCarted{{$data->id}}" hidden>
                        <div class="col text-end" onclick="increase('{{$data->id}}')"><i class="fas fa-plus"></i></div>
                        <div class="col-3 text-center"><a id="labelCarted{{$data->id}}">1</a></div>
                        <div class="col text-start" onclick="decrease('{{$data->id}}')"><i class="fas fa-minus"></i></div>
                    </div>
                </div>
                <div class="col" style="max-width: 35%;">
                    <button class="btn btn-outline-primary w-100">Detail</button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="row mt-5">
    <nav aria-label="Page navigation" class="pt-3">
                            <ul class="pagination" style="justify-content: center;">
                                @if ($medItem->onFirstPage())
                                    <li class="page-item disabled" hidden>
                                        <span class="page-link" aria-hidden="true">&laquo;</span>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $medItem->previousPageUrl() }}" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                @endif

                                @foreach ($medItem->getUrlRange(1, $medItem->lastPage()) as $page => $url)
                                    <li class=" page-item {{ $page == $medItem->currentPage() ? 'active' : '' }}">
                                        <a class="page-link fs-5 p-2" href="{{ $url }}">{{ $page }}</a>
                                    </li>
                                @endforeach

                                @if ($medItem->hasMorePages())
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $medItem->nextPageUrl() }}" aria-label="Next">
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
    </div>
    <div id="footerCart" class="row border-top mt-4 pt-3 px-4 justify-content-center" hidden>
        <div class="col text-start">
            <label class="fs-6"><a id="totalProduct"></a> Produk | Estimasi Harga: Rp.<a id="estimatedPrice"></a></label>
        </div>
        <div class="col text-end">
            <button class="btn btn-primary" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i class="fas fa-shopping-cart"></i> | Keranjang Saya</button>
        </div>
    </div>
</div>


<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel" style="min-width:fit-content">
  <div class="offcanvas-header">
    <h5 id="offcanvasRightLabel">Keranjang Saya <button></button></h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
  </div>
</div>


<script>
    cartExists = JSON.parse(localStorage.getItem('carted')) || [];
    cartExists.forEach(element => {
    console.log(element);
});

function myCart() {
    // Retrieve the array from local storage
    var cartData = JSON.parse(localStorage.getItem('carted'));

    // Make an AJAX request to send the array to the controller
    $.ajax({
        type: 'get',
        url: '/h/find/med/cart',
        data: {
            cartData: cartData
        },
        contentType:'html',
        success: function(response) {
            if(cartData[0].qty > 0){
                console.log(response);
                console.log(cartData[0]);
                $('.offcanvas-body').html(response);
            } else {
                $('.offcanvas-body').html();
                location.reload(1)
            }
        }
    });
} myCart()

// localStorage.clear()
    function checkCartItem(){
        cartExists = JSON.parse(localStorage.getItem('carted')) || [];
        let totalQty = 0
        let totalPrice = 0

        if(cartExists[0] && cartExists){
            cartExists.forEach(element =>{
                element.price_qty = element.qty * element.price
                totalQty += element.qty
                totalPrice += element.price_qty
            })
            $('#totalProduct').html(totalQty)
            console.log(totalQty)
            const formattedPrice = totalPrice.toLocaleString('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0,
                maximumFractionDigits: 0
            });

            $('#estimatedPrice').html(formattedPrice);
            $('#footerCart').removeAttr('hidden')
            myCart()
        } else {
            $('.offcanvas-body').html();
            $('#offcanvasRight').offcanvas('hide')
            $('#footerCart').attr('hidden', true)
        }
    } checkCartItem()
    
    function increase(id){
        let existingCarted = JSON.parse(localStorage.getItem('carted')) || [];
        console.log(existingCarted[0].qty);
        existingCarted.forEach(element => {
            if(element.item_id == id){
                element.qty += 1
                $('#labelCarted'+element.item_id).html(element.qty)
            }
        });
        localStorage.setItem('carted', JSON.stringify(existingCarted));
        checkCartItem()
    }

    function decrease(id) {
        let existingCarted = JSON.parse(localStorage.getItem('carted')) || [];

        existingCarted.forEach((element, index) => {
            if (element.item_id === id) {
                element.qty -= 1;
                if(element.qty > 0){
                    $('#labelCarted' + element.item_id).html(element.qty);
                } else {
                    $('#btnCarted' + id).attr('hidden', true);
                    $('#btn' + id).attr('hidden', false);
                    
                    // Remove item from local storage if qty is zero
                    existingCarted.splice(index, 1);
                }
            }
        });

        localStorage.setItem('carted', JSON.stringify(existingCarted));
        checkCartItem()
    }

    function find() {
        $.ajax({
            url:'/h/find/med',
            method:'get',
            contentType:'html',
            success: function(response){
                $('#mymodal').modal('show');
                $('.modal-header').show();
                $('.modal-title').show();
                $('.modal-title').html('Cari Obat');
                $('#mymodal .modal-body').html(response);
                $('.modal-footer').hide();
                console.log('open form');
            }
        })
    }

    function addToCart(id, price) {
        let existingCarted = JSON.parse(localStorage.getItem('carted')) || [];

        // New item to append
        let newItem = {
            'item_id': id,
            'qty': 1,
            'price':parseInt(price),
            'price_qty':0
        };
        
        // Append the new item to the existing array
        existingCarted.push(newItem);
        
        // Store the updated array back in local storage
        localStorage.setItem('carted', JSON.stringify(existingCarted));
        
        const addToCartId = `btn${id}`;
        const addToCartButton = document.getElementById(addToCartId);
        
        const btnCartedId = `btnCarted${id}`;
        const btnCartedRow = document.getElementById(btnCartedId);
        
        if (addToCartButton && btnCartedRow) {
            // Hide "Tambah Keranjang" button
            addToCartButton.setAttribute('hidden', 'true')
            
            // Show the row with carted item controls
            btnCartedRow.removeAttribute('hidden')
        }
        $('#footerCart').removeAttr('hidden')
        checkCartItem()
    }

    const cartedItems = JSON.parse(localStorage.getItem('carted')) || [];

    cartedItems.forEach(item => {
        const buttonId = `btn${item.item_id}`;
        const buttonElement = document.getElementById(buttonId);
        const cartedCounterId = `labelCarted${item.item_id}`;
        const cartedCounterElement = document.getElementById(cartedCounterId);

        if (buttonElement) {
            // Hide the regular "Tambah Keranjang" button
            buttonElement.setAttribute('hidden', 'true')

            // Show the row with carted item controls
            const cartedRowId = `btnCarted${item.item_id}`;
            const cartedRowElement = document.getElementById(cartedRowId);
            if (cartedRowElement) {
                cartedRowElement.removeAttribute('hidden')
            }

            // Display the carted item count
            if (cartedCounterElement) {
                cartedCounterElement.innerText = item.qty;
            }
        }
    });
</script>
@endsection