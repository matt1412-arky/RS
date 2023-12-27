<input type="hidden" id="id">

@foreach ($blodd as $data)
    <form action="/h/goldar/delete/{{ $data->id }}" method="post">
        {{ csrf_field() }}
        <input hidden id="user_id" name="user_id">
        <table class="table table-dark">
            <tr>
                <td>Anda akan menghapus golongan darah {{ $data->code }} ?</td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit" class="btn btn-primary" style="float:right;">Ya</button>
                    <button type="button" onclick="cancel()" class="btn btn-warning"
                        style="margin-left: 170px; margin-right: 170px;">Tidak</button>
                </td>
            </tr>
        </table>
    </form>

    <script>
        function cancel() {
            $('#mymodal').modal('hide');
        }
        $('#user_id').val(localStorage.getItem('user_id'))
    </script>
@endforeach
