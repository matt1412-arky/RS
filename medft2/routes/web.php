<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DetailDoctorController;
use App\Http\Controllers\DoctorTreatmentController;
use App\Http\Controllers\FindMedController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\GoldarController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\PasienRest;
use App\Http\Controllers\ProfileDoctorController;
use App\Http\Controllers\ProfileRestController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SpecializationController;
use App\Http\Controllers\TarikSaldoController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Profiler\Profile;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/test', function () {
    return view('findMed.cart');
});

Route::get('/', function () {
    return view('dashboard.dashboard');
});

Route::group([
    'prefix' => 'auth',
    'as' => 'auth.'
], function () {
    Route::view('login', 'auth/auth-login')->name('login');
    Route::view('emailverif', 'auth/forget-password/verification-email')->name('emailverif');
    Route::view('inputotp', 'auth/forget-password/input-OTP')->name('inputotp');
    Route::view('setpassword', 'auth/forget-password/setpassword')->name('setpassword');

    Route::group([
        'prefix' => 'regis',
        'as' => 'regis.'
    ], function () {
        Route::view('emailverif', 'auth/register/verification-email')->name('emailverif');
        Route::view('inputotp', 'auth/register/input-OTP')->name('inputotp');
        Route::view('setpassword', 'auth/register/setpassword')->name('setpassword');
        Route::get('register', [RegisterController::class, 'form'])->name('register');
    });
});

Route::group([
    'prefix' => 'h',
    'as' => 'home.',
], function () {
    Route::group([
        'prefix' => 'hakakses',
        'as' => 'hakakses.',
    ], function () {
        Route::get('/', [RoleController::class, 'index']);
        Route::get('/form', [RoleController::class, 'form']);
        Route::post('/create', [RoleController::class, 'create']);
        Route::get('/editform/{id}', [RoleController::class, 'editForm']);
        Route::post('/editsave/{id}', [RoleController::class, 'editSave']);
        Route::get('/deleteform/{id}', [RoleController::class, 'deleteForm']);
        Route::post('/delete/{id}', [RoleController::class, 'delete']);
        Route::get('/search', [RoleController::class, 'search']);
        Route::get('/search-roles', [RoleController::class, 'searchRoles']);
    });

    Route::group([
        'prefix' => 'pasien',
        'as' => 'pasien.',
    ], function () {
        Route::get('/', [PasienController::class, 'index']);
        Route::get('/form', [PasienController::class, 'form']);
        Route::post('/create', [PasienController::class, 'create']);
        Route::get('/editform/{id}', [PasienController::class, 'editForm']);
        Route::post('/editsave/{id}', [PasienController::class, 'editSave']);
        Route::get('/deleteform/{id}', [PasienController::class, 'deleteForm']);
        Route::post('/delete/{id}', [PasienController::class, 'delete']);
    });

    Route::group([
        'prefix' => 'goldar',
        'as' => 'goldar.',
    ], function () {
        // Routes for 'goldar'...
        Route::get('/', [GoldarController::class, 'index']);
        Route::get('/form', [GoldarController::class, 'form']);
        Route::post('/create', [GoldarController::class, 'create']);
        Route::get('/editForm/{id}', [GoldarController::class, 'editForm']);
        Route::post('/editSave/{id}', [GoldarController::class, 'editSave']);
        Route::get('/deleteform/{id}', [GoldarController::class, 'deleteForm']);
        Route::post('/delete/{id}', [GoldarController::class, 'delete']);
    });

    Route::group([
        'prefix' => 'lokasi',
        'as' => 'lokasi.',
    ], function () {
        // untuk lokasi
        Route::get('/', [LokasiController::class, 'indexView']);
        Route::get('/', [LokasiController::class, 'index']);
        Route::get('/form', [LokasiController::class, 'formview']);
        Route::get('/', [LokasiController::class, 'index']);
        // Route::get('/lokasi/form', [LokasiController::class, 'form']);
        // Route::post('/lokasi/create', [LokasiController::class, 'create']);
        // Route::get('/lokasi/editForm/{id}', [LokasiController::class, 'editForm']);
        // Route::post('/lokasi/editSave/{id}', [GoldarController::class, 'editSave']);
        // Route::get('/lokasi/deleteform/{id}', [GoldarController::class, 'deleteForm']);
        // Route::post('/lokasi/delete/{id}', [GoldarController::class, 'delete']);

    });

    // untuk lokasi level
    // Route::get('/golongan_darah', [GoldarController::class, 'index']);
    // Route::get('/golongan_darah/form', [GoldarController::class, 'form']);
    // Route::post('/golongan_darah/create', [GoldarController::class, 'create']);
    // Route::get('/golongan_darah/editForm/{id}', [GoldarController::class, 'editForm']);
    // Route::post('/golongan_darah/editSave/{id}', [GoldarController::class, 'editSave']);
    // Route::get('/golongan_darah/deleteform/{id}', [GoldarController::class, 'deleteForm']);
    // Route::post('/golongan_darah/delete/{id}', [GoldarController::class, 'delete']);

    Route::group([
        'prefix' => 'spesialisasi',
        'as' => 'spesialisasi.',
    ], function () {
        // Routes for 'spesialisasi'...
        Route::get('/', [SpecializationController::class, 'index']);
        Route::get('/form/add', [SpecializationController::class, 'addForm']);
        Route::get('/form/edit/{id}', [SpecializationController::class, 'editForm']);
        Route::get('/form/delete/{id}', [SpecializationController::class, 'deleteForm']);
        Route::get('/cari/{name}', [SpecializationController::class, 'find']);
    });

    Route::group([
        'prefix' => 'profil',
        'as' => 'profil.',
    ], function () {
        Route::get('/{id}', [ProfileController::class, 'index']);
        Route::get('/{id}/form/bio', [ProfileController::class, 'bioForm']);
        Route::get('/{id}/form/email', [ProfileController::class, 'emailForm']);
        Route::get('/{id}/form/pass', [ProfileController::class, 'passForm']);
    });

    Route::group([
        'prefix' => 'tindakan',
        'as' => 'tindakan.',
    ], function () {
        Route::get('/{id}', [DoctorTreatmentController::class, 'index']);
        Route::get('/{id}/form', [DoctorTreatmentController::class, 'form']);
        Route::get('/{id}/form/delete/{id_treatment}', [DoctorTreatmentController::class, 'deleteForm']);
        Route::get('/checkName/{name}/{doctor_id}',  [DoctorTreatmentController::class, 'checkName']);

    });

    Route::group([
        'prefix' => 'find/med/',
        'as' => 'findMed.',
    ], function () {
        Route::get('/', [FindMedController::class, 'index']);
        Route::get('/test', [FindMedController::class, 'test']);
        Route::get('/find', [FindMedController::class, 'find']);
        Route::get('/found', [FindMedController::class, 'found']);
        Route::get('/cart', [FindMedController::class, 'cart']);
    });

    Route::group([
        'prefix' => 'profil-dokter',
        'as' => 'profil-dokter.',
    ], function () {
        Route::get('/{id}', [ProfileDoctorController::class, 'index']);
        Route::get('/changeimage/{id}', [ProfileDoctorController::class, 'viewimage']);
        Route::post('/imgsave/{id}', [ProfileDoctorController::class, 'imgSave']);
    });

    Route::group([
        'prefix' => 'detail-dokter',
        'as' => 'detail-dokter.',
    ], function () {
        Route::get('/{id}', [DetailDoctorController::class, 'index']);
    });

    Route::group([
        'prefix' => 'dashboard',
        'as' => 'dashboard.',
    ], function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    });

    // untuk penarikan saldo
    Route::group([
        'prefix' => 'tarik-saldo',
        'as' => 'tarik-saldo'
    ], function () {
        Route::get('/{id}', [TarikSaldoController::class, 'index']);
        Route::get('/{id}/form', [TarikSaldoController::class, 'form']);
        Route::get('/{id}/pinform', [TarikSaldoController::class, 'pinform']);
    });

    // untuk cari dokter
    Route::group([
        'prefix' => 'cari-dokter',
        'as' => 'cari-dokter'
    ], function () {
        Route::view('/', 'cari_dokter.index');
        Route::view('/form', 'cari_dokter.form');
        Route::view('/formview', 'cari_dokter.formview');
    });
});
