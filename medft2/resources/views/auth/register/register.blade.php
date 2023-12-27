<div class="card card-plain d-flex justify-content-center">
    <div class="card-header pb-0 text-center">
        <h4 class="font-weight-bolder">Daftar</h4>
        <button type="button" class="btn btn-link fs-4 position-absolute top-0 end-0 m-3" data-bs-dismiss="modal">
            <i class="fa fa-times"></i>
        </button>
    </div>
    <div class="card-body">
        <form role="form">
            <div class="mb-3">
                <label for="nama"><strong>Nama Lengkap</strong><span class="text-danger">*</span></label>
                <input type="text" class="form-control form-control-lg" placeholder="Masukkan nama Anda"
                    aria-label="Nama" name="nama" id="nama">
                <label id="namaError" class="text-danger" style="font-size: 12px; font-style: italic"></label>
            </div>
            <div class="mb-3">
                <label for="phone"><strong>Nomor handphone</strong></label>
                <input type="text" class="form-control form-control-lg" inputmode="numeric" pattern="[0-9]+"
                    placeholder="Masukkan nomor handphone" aria-label="Nomor handphone" name="phone" id="phone">
                <label id="phoneError" class="text-danger" style="font-size: 12px; font-style: italic"></label>
            </div>
            <div class="mb-3">
                <label for="daftarSebagai"><strong>Daftar Sebagai</strong></label>
                <select name="role" id="role" class="form-control">
                    <option value="">--Pilih--</option>
                    @foreach ($role->where('name', '!=', 'Umum') as $data)
                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="text-center">
                <button type="button" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0"
                    onclick="daftar()">Daftar</button>
                {{-- <label id="locked" class="text-danger" style="font-size: 12px; font-style: italic"></label> --}}
            </div>
        </form>
    </div>
</div>
