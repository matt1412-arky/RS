<input type="hidden" id="id">

    {{ csrf_field() }}
    <input hidden id="user_id" name="user_id">
    <table class="table table-light">
        <tr>
            <td>
                <input id="entered_pin" type="password" onchange="pinPesan()" class="form-control">
                <input id="customer_pin" value="{{$customer->pin}}" hidden>
                <label id="errorMessage" style="color:red"></label>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <button type="submit" onclick="cekPin()" class="btn btn-primary" style="float:right;">Ok</button>
            </td>
        </tr>
    </table>
