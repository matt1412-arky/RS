@extends('layout.apps')
@section('title', 'beranda')
@section('content')

<div class="container">
    <div class="main-body">
          <!-- /Breadcrumb -->
          <input id="doctor_id" hidden value="{{$profil[0]->id}}">
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body" >
                  <div class="d-flex flex-column align-items-center text-center">
                  <div class="p-0" style="width: 100%; max-width: 500px; margin: auto; position: relative; overflow: hidden;">
                    <a>
                      <div style="padding-bottom: 100%; position: relative;">
                        <img src="/photos/{{ $profil[0]->biodata->image_path }}" onclick="javascript:window.open('/photos/{{$profil[0]->biodata->image_path}}','_self')" style="width: 100%; height: 100%; position: absolute; top: 0; left: 0; object-fit:cover" class="rounded-circle border border-5">
                        <button class="btn btn-link" style="float: right;" onclick="changeimage('{{$profil[0]->id}}')"><i class="fas fa-pencil-alt"></i></button>
                      </div>
                    </a>
                  </div>
                    <div class="mt-3">
                      <h4>{{ $profil[0]->biodata->fullname }}</h4>
                      <p class="text-secondary mb-1">{{ $specialization[0]->name }}</p>
                  
                      <button class="btn btn-primary">Janji</button>
                      <button class="btn btn-outline-primary">Obrolan / Konsultasi</button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mt-3">
                <ul class="list-group list-group-flush">
                  <li style="background-color: lightblue;" class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                      <h6 class="mb-0">Tentang Saya</h6>
                  </li>
                  <br>
                  <h6 class="mb-0">&nbsp;&nbsp;Tindakan Medis</h6>
                  @foreach( $medis as $data )
                  <li class="border-0 list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <span >- {{ $data->name }}</span>
                  </li>
                  @endforeach
                  <br>
                  <h6 class="mb-0">&nbsp;&nbsp;Riwayat Praktek</h6>
                  @foreach($office as $data)
                  <li class="border-0 list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <span >{{ $data->medicalFacility->medicalFacilityCategory->name }} {{ $data->medicalFacility->name }}</span>
                    <table class="table table-borderless mb-0">
                            <tr>
                                <td>&nbsp;&nbsp;&nbsp;<span >{{$data->doctor->str}}</span></td>
                                <td  align="right">{{ \Carbon\Carbon::parse($data->start_date)->format('Y') }} - {{ isset($currentdate) ? $currentdate : (\Carbon\Carbon::parse($data->end_date)->format('Y') ?? 'Sekarang') }}</td>
                            </tr>
                        </table>
                  </li>
                  @endforeach
                  <br>
                  <h6 class="mb-0">&nbsp;&nbsp;Pendidikan</h6>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    @foreach ($education as $data)
                    <table class="table table-borderless mb-0">
                            <h6 class="mb-0">{{ $data->institution_name }}</h6>
                            <tr>
                                <td>&nbsp;&nbsp;&nbsp;<span >{{ $data->major }}</span></td>
                                <td  align="right">{{ $data->end_year }}</td>
                            </tr>
                    </table>
                    @endforeach
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body" style="min-height: 90vh;">
                <nav>
                  <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-tindakan-tab" data-bs-toggle="tab" data-bs-target="#nav-tindakan" type="button" role="tab" aria-controls="nav-tindakan" aria-selected="true">Tindakan</button>
                    <button class="nav-link" id="nav-aktifitas-tab" data-bs-toggle="tab" data-bs-target="#nav-aktifitas" type="button" role="tab" aria-controls="nav-aktifitas" aria-selected="false">Aktifitas</button>
                    <button class="nav-link" id="nav-konsultasi-tab" data-bs-toggle="tab" data-bs-target="#nav-konsultasi" type="button" role="tab" aria-controls="nav-konsultasi" aria-selected="false">Konsultasi</button>
                    <button class="nav-link" id="nav-pengaturan-tab" data-bs-toggle="tab" data-bs-target="#nav-pengaturan" type="button" role="tab" aria-controls="nav-pengaturan" aria-selected="false">Pengaturan</button>
                  </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                  <div class="tab-pane fade show active" id="nav-tindakan" role="tabpanel" aria-labelledby="nav-tindakan-tab" tabindex="0"></div> <!-- Tambahan Tata include -->
                  <div class="tab-pane fade" id="nav-aktifitas" role="tabpanel" aria-labelledby="nav-aktifitas-tab" tabindex="0">Aktifitas</div>
                  <div class="tab-pane fade" id="nav-konsultasi" role="tabpanel" aria-labelledby="nav-konsultasi-tab" tabindex="0">Konsultasi</div>
                  <div class="tab-pane fade" id="nav-pengaturan" role="tabpanel" aria-labelledby="nav-pengaturan-tab" tabindex="0">Pengaturan</div>
                </div>
                </div>
              </div>
             </div>
            </div>
          </div>
        </div>
    </div>

<script>
var doctor_id = $('#doctor_id').val()
console.log(doctor_id);
$.ajax({
  url:'/h/tindakan/'+doctor_id,
  type:'get',
  contentType:'html',
    success:function(response){
      $('#nav-tindakan').html(response)
    }, error:function(e){
      console.log(e);
    }
})


  function changeimage(id){
    $.ajax({
      url:'/h/profil-dokter/changeimage/'+id,
      type:'GET',
      contentType:'html',
      success:function(image){
          console.log(image);
          $('#mymodal').modal('show');
          $('.modal-title').html('Ganti Foto');
          $('.modal-body').html(image);
          $('.modal-footer').hide();
      }
    }); 
  }
</script>

@endsection