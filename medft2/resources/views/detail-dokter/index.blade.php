@extends('layout.apps')
@section('title', 'beranda')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style>
        [aria-expanded="false"] > .expanded, [aria-expanded="true"] > .collapsed {
        display: none;
    }
    
    p {
      margin-left:14px;
      font-size:12px;
      color:#333;
      margin-bottom:-6px;
    }
    
    </style>
</head>
<body>
<div class="card p-3" style="background-color: azure;">
    <div class="main-body">
        <div class="card">
            <div class="card-body">
                <div class="row text-center" style="height: 250px;">
                    <div class="col-md-4 "><img src="/photos/{{ $profil[0]->biodata->image_path }}" onclick="javascript:window.open('/photos/{{$profil[0]->biodata->image_path}}','_self')" class="rounded-circle h-100" width="260"></div>
            
                <div class="col p-6">  
                    <h4 class="text-secondary ">{{ $profil[0]->biodata->fullname }}</h4>
                    <h6 class="text-secondary mb-0">{{ $specialization[0]->name }}</h6>
                    <p class="text-secondary" style="font-size: medium;">
                    @if ($office[0]->start_date)
                        @php
                            $dob = new DateTime($office[0]->start_date);
                            $age = now()->diff($dob)->y;
                        @endphp
                    @else
                        <p>No date of birth available</p>
                    @endif
                    {{ $age }} Tahun pengalaman</p>
                </div>
                    <div class="col p-6">
                        <button class="btn btn-primary">Chat Dokter</button>
                        <h6 style="color: #007bff;">Rp 30.000</h6>
                    </div>
                </div>
            </div>
        </div>
          <!-- /Breadcrumb -->
        <div class="row gutters-sm">
            <div class="col-md-4 mb-3">  
                <div class="card mt-3">
                    <ul class="list-group list-group-flush">
                        <!-- header  -->
                    <li style="background-color: lightblue;" class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <h6 class="mb-0">Tindakan Medis</h6>
                    </li>
                    @foreach( $medis as $data )
                        <!-- foreach  -->
                    <li class="border-0 list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <h6 class="mb-0">- {{ $data->name }}</h6>
                    </li>
                    @endforeach
                        <!-- endforeach -->
                    </ul>
                </div>
                <div class="card mt-3">
                    <ul class="list-group">
                    <!-- header  -->
                    <li style="background-color: lightblue;" class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <h6 class="mb-0">Riwayat Praktek</h6>
                    </li>
                    <!-- foreach  -->
                    @foreach($office as $index => $data)
                    <li class="border-0 list-group-item align-items-center">
                        <table class="table table-borderless mb-0">
                            <h6 class="mb-0">{{ $data->medicalFacility->medicalFacilityCategory->name }} {{ $data->medicalFacility->name }}, {{ $data->medicalFacility->location->name }}</h6>
                            <tr>
                                <td>&nbsp;&nbsp;&nbsp;<span class="text-secondary">{{$data->specialization}}</span></td>
                                <td class="text-secondary" align="right">{{ \Carbon\Carbon::parse($data->start_date)->format('Y') }} - {{ isset($currentdate) ? $currentdate : (\Carbon\Carbon::parse($data->end_date)->format('Y')) }}</td>
                            </tr>
                        </table>
                    </li>
                    @endforeach
                    <!-- endforeach -->
                    </ul>
                </div>
                <div class="card mt-3">
                    <ul class="list-group">
                    <!-- header  -->
                    <li style="background-color: lightblue;" class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <h6 class="mb-0">Pendidikan</h6>
                    </li>
                    <!-- foreach  -->
                    @foreach ($education as $data)
                    <li class="border-0 list-group-item align-items-center">
                        <table class="table table-borderless mb-0">
                            <h6 class="mb-0">{{ $data->institution_name }}</h6>
                            <tr>
                                <td>&nbsp;&nbsp;&nbsp;<span class="text-secondary">{{ $data->major }}</span></td>
                                <td class="text-secondary" align="right">{{ $data->end_year }}</td>
                            </tr>
                        </table>
                    </li>
                    @endforeach
                    <!-- endforeach -->
                    </ul>
                </div>
            </div>
            <div class="col-md-8">
                <div class="mt-3 mb-6">
                    <div class="card-body" style="min-height: 90vh;">
                    <div class="card mt-3">
                    <ul class="list-group">
                        <li style="background-color: lightblue;" class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <b>Lokasi Paraktek</b>
                        </li>
                        <li class="border-0 list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <div id="accordion" class="w-100">
                            @foreach($office as $index => $data)
                            <div class="card">
                                <div class="card-header border-0 ">
                                    <h6><b>{{ $data->medicalFacility->medicalFacilityCategory->name }} {{ $data->medicalFacility->name }}</b></h6>
                                    <table class="table table-borderless" >
                                        <tr>
                                            <td><h6>{{ $data->specialization }}</h6><h6>{{ $data->medicalFacility->full_address }} Kecamatan, {{ $data->medicalFacility->location->level->name }}</h6></td>
                                            <td align="right"><h6 style="color: #007bff;">Konsultasi mulai dari <br> Rp {{ number_format($prices[0]->price,0,',','.') }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h6></td>
                                        </tr>
                                    </table>
                                    <hr>

                                    <div class="accordion" id="accordionFlushExample{{$index}}">
                                        <div class="accordion-item" >
                                        <h2 class="accordion-header" id="flush-heading{{$index}}">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{$index}}" aria-expanded="false" aria-controls="flush-collapse{{$index}}" onclick="toggleButtonText({{$index}})">
                                                Lihat Jadwal Praktek
                                            </button>
                                        </h2> 

                                        <div id="flush-collapse{{$index}}" class="accordion-collapse collapse" aria-labelledby="flush-heading{{$index}}" data-bs-parent="#accordionFlushExample{{$index}}">
                                            <div class="accordion-body">
                                                <table class="table table-borderless">
                                                    @foreach($data->medicalFacility->schedule as $schedule)
                                                    <tr>
                                                        <td>{{ $schedule->day}}</td>
                                                        <td>{{ $schedule->time_schedule_start }} - {{ $schedule->time_schedule_end }}</td>
                                                        <td class="text-center align-middle"><button class="btn btn-primary">Buat Janji</button></td>
                                                    </tr>
                                                    @endforeach
                                                </table>
                                            </div>
                                        </div>
                                        </div>
                                    </div> 
                                    
                                </div>
                            </div>
                            <br>
                            @endforeach
                        </div>
                        </div>
                        </li>
                    </ul>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>

<script>
    function toggleButtonText(index) {
        const button = document.querySelector(`#flush-heading${index} .accordion-button`);
        button.innerText = button.innerText === 'Lihat Jadwal Praktek' ? 'Sembunyikan Jadwal Praktek' : 'Lihat Jadwal Praktek';
    }
</script>

@endsection