<?php

use App\Http\Controllers\AdminRestController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BiodataRestController;
use App\Http\Controllers\CustomerRestController;
use App\Http\Controllers\DoctorRestController;
use App\Http\Controllers\DoctorTreatmentController;
use App\Http\Controllers\ForgetPasswordRestController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\LokasiLevelController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\LoginRestController;
use App\Http\Controllers\MenuRestController;
use App\Http\Controllers\ProfileRestController;
use App\Http\Controllers\RegisterRestController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SpecializationRestController;
use App\Http\Controllers\UserRestController;

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});

// Authentication Routes
Route::post('login', [LoginRestController::class, 'login']);
Route::post('send-otp', [UserRestController::class, 'sendOTP']);
Route::post('verify-otp', [UserRestController::class, 'verifyOTP']);
Route::post('resend-otp', [UserRestController::class, 'resendOTP']);
Route::post('user/create/{biodata_id}', [RegisterRestController::class, 'create']);
Route::post('biodata', [BiodataRestController::class, 'create']);
Route::post('admin/create/{biodata_id}', [AdminRestController::class, 'create']);
Route::get('admin/last-code', [AdminRestController::class, 'getLastAdminCode']);
Route::post('doctor/create', [DoctorRestController::class, 'create']);
Route::post('customer/create', [CustomerRestController::class, 'create']);
Route::get('login/{email}', [LoginRestController::class, 'getCurrentUser']);

Route::prefix('forget-password')->group(function () {
    Route::post('send-otp', [ForgetPasswordRestController::class, 'sendOTP']);
    Route::post('verify-otp', [ForgetPasswordRestController::class, 'verifyOTP']);
    Route::post('resend-otp', [ForgetPasswordRestController::class, 'resendOTP']);
    Route::patch('reset-password', [ForgetPasswordRestController::class, 'resetPassword']);
    Route::get('password-history/{email}', [ForgetPasswordRestController::class, 'passwordHistory']);
});

// Profile Routes
Route::prefix('profil')->group(function () {
    Route::post('/edit/check/{email}', [ProfileRestController::class, 'checkEmail']);
    Route::post('/edit/confirm/{email}', [ProfileRestController::class, 'OTPGen']);
    Route::put('/edit/email/{id}', [ProfileRestController::class, 'editEmail']);
    Route::post('/edit/checkpass/{id}', [ProfileRestController::class, 'checkPassword']);
    Route::post('/edit/pass/{id}', [ProfileRestController::class, 'editPassword']);
    Route::post('/check/{name}', [ProfileRestController::class, 'checkBiodata']);
    Route::post('/edit/{id}', [ProfileRestController::class, 'editBiodata']);
});

// Pasien Routes
Route::prefix('pasien')->group(function () {
    // Route::get('/', [PasienController::class, 'home']);
    // Route::get('/{id}', [PasienController::class, 'getById']);
    // Route::post('/', [PasienController::class, 'simpan']);
    // Route::put('/{id}', [PasienController::class, 'edit']);
    // Route::delete('/{id}', [PasienController::class, 'hapus']);
    Route::get('/deleteapi/{id}', [PasienController::class, 'deleteApi']);
});

//Route lokasi
Route::prefix('lokasi')->group(function () {
    Route::get('/lokasi', [LokasiController::class, 'getAll']);
    Route::get('/lokasi', [LokasiController::class, 'index']);
    Route::get('/lokasi', [LokasiController::class, 'simpan']);
    Route::get('/lokasi/checkName', [LokasiController::class, 'checkName']);
    Route::get('/lokasi/{id}', [LokasiController::class, 'getById']);
    Route::get('/lokasi/edit/{id}', [LokasiController::class, 'edit']);
    Route::get('/lokasi/delete/{id}', [LokasiController::class, 'hapus']);
});

//Route lokasi level
Route::prefix('lokasilevel')->group(function () {
    Route::get('/', [LokasiLevelController::class, 'getAll']);
    Route::get('/', [LokasiLevelController::class, 'index']);

    Route::get('/parentlocation', [LokasiController::class, 'parentLokasi']);
    Route::get('/childlocation/{parent_id}', [LokasiController::class, 'childLokasi']);
    Route::get('/lokasi/getbylokasilevel/{id}', [LokasiController::class, 'getByLokasiLevelId']);
});

// Profile Routes
Route::prefix('profil')->group(function () {
    Route::post('/edit/check/{email}', [ProfileRestController::class, 'checkEmail']);
    Route::post('/edit/confirm/{email}', [ProfileRestController::class, 'OTPGen']);
    Route::put('/edit/email/{id}', [ProfileRestController::class, 'editEmail']);
    Route::post('/edit/checkpass/{id}', [ProfileRestController::class, 'checkPassword']);
    Route::post('/edit/pass/{id}', [ProfileRestController::class, 'editPassword']);
    Route::post('/check/{phone}/{id}', [ProfileRestController::class, 'checkBiodata']);
    Route::post('/edit/{id}', [ProfileRestController::class, 'editBiodata']);
});

// Specialization Routes
Route::prefix('spesialisasi')->group(function () {
    Route::post('/create', [SpecializationRestController::class, 'create']);
    Route::post('/edit/{id}', [SpecializationRestController::class, 'edit']);
    Route::post('/delete/{id}', [SpecializationRestController::class, 'delete']);
    Route::get('/check/{name}', [SpecializationRestController::class, 'check']);
});

Route::prefix('menu')->group(function () {
    Route::get('parentmenu', [MenuRestController::class, 'parentMenu']);
    Route::get('publicmenu', [MenuRestController::class, 'publicMenu']);
    Route::get('childmenu/{parent_id}', [MenuRestController::class, 'childMenu']);
    Route::get('menurole/{role_id}', [MenuRestController::class, 'menuRole']);
});
// Doctor Treatment Routes
Route::prefix('tindakan')->group(function () {
    Route::post('/tambah', [DoctorTreatmentController::class, 'tambah']);
    Route::post('/hapus', [DoctorTreatmentController::class, 'hapus']);
});
