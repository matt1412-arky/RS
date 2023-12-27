@extends('layout.apps')
@section('title', 'Cari Dokter')
@section('content')


<div class="card w-100">
    <button type="button" onclick="openForm()" class="btn btn-outline-primary w-25" style="float:right;">Search</button>

</div>

    <table class="table table-dark table-striped">
        
    </table>
    <script>

        function openForm() {
            $.ajax({
                url: '/h/cari-dokter/form',
                type: 'get',
                contentType: 'html',
                success: function(goldarForm) {
                    console.log(goldarForm);
                    $('#mymodal').modal('show');
                    $('.modal-title').html('Cari Dokter');
                    $('.modal-body').html(goldarForm);
                    $('.modal-footer').hide();

                }
            });
        }

        
    </script>
@endsection