<table class="table align-middle table-hover w-100">
    @foreach($found as $data)
    <tr style="max-height:150px">
        <td style="max-width: 150px;max-height:150px">  <img src="{{$data->image_path}}" class="img-fluid h-100 w-100 object-fit-cover"> </td>
        <td class=" overflow-hidden" style="max-width: 140px;height:150px">
            <div class="row overflow-hidden">
                <a><b>{{$data->name}}</b></a>
            </div>
            <div class="row overflow-hidden">
                <a>{{$data->indication}}</a>
            </div>
            <div class="row">
                <a>Rp. {{$data->price_min}} s/d Rp. {{$data->price_max}}</a>
            </div>
        </td>
        <td style="width: 30%;">
            <div class="row align-items-end">
                <div class="col text-end" onclick="increase('{{$data->id}}')"><i class="fas fa-plus"></i></div>
                <div class="col-3 text-center"><a id="labelCarted{{$data->id}}">{{$data->amount}}</a></div>
                <div class="col text-start" onclick="decrease('{{$data->id}}')"><i class="fas fa-minus"></i></div>
            </div>
        </td>
    </tr>
    @endforeach
</table>