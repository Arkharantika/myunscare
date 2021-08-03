<?php

// namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleAdminController;
use App\Http\Controllers\RoleUserController;

// -> Untuk Data User
use App\Http\Controllers\UserDataController;
use App\Http\Controllers\DataPersonalController;

// -> Untuk User Covid 
use App\Http\Controllers\ClaimController;
use App\Http\Controllers\ClaimVaksinController;
use App\Http\Controllers\IsolasiController;
use App\Http\Controllers\GejalaController;

// -> Untuk Admin Covid
use App\Http\Controllers\DataCovidController;
use App\Http\Controllers\DataGejalaController;
use App\Http\Controllers\DataVaksinController;
use App\Http\Controllers\DataIsolasiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/// [] =================================== [] 
/// [] === <- List middleware Routes -> == [] 
/// [] =================================== [] 

// (Route Ini Hampir Tidak Terpakai, Abaikan Saja !!)

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
 
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
 
    Route::middleware(['admin'])->group(function () {
        Route::get('admin', [RoleAdminController::class, 'index']);
    });
 
    Route::middleware(['user'])->group(function () {
        Route::get('user', [RoleUserController::class, 'index']);
        Route::get('/user/claimpositif', [ClaimController::class, 'index']);
    });
 
    Route::get('/logout', function() {
        Auth::logout();
        return redirect()->route('login');
    });
 
});

/// [] =================================== [] 
/// [] <- List non-middleware Routes -> == [] 
/// [] =================================== [] 


// +---------------------------------------------------------------------------------------+ //
//                                   <<< User Role >>>
// +---------------------------------------------------------------------------------------+ //

// -> Untuk Update Data User
Route::patch('/userdata/{id}', [UserDataController::class, 'update'])->name('update');

// -> Untuk CLaim Positif Covid 19
Route::get('/user/claimcovid', [ClaimController::class, 'index']);
Route::post('/user/claimcovid', [ClaimController::class, 'store'])->name('store');
Route::patch('/user/claimcovid/{id}', [ClaimController::class, 'update'])->name('update');

// -> Untuk Gejala Covid
Route::get('/user/gejalacovid', [GejalaController::class, 'index']);
Route::post('/user/gejalacovid', [GejalaController::class, 'store'])->name('store');
Route::patch('/user/gejalacovid/{id}', [GejalaController::class, 'update'])->name('update');

// -> Untuk Claim Vaksin
Route::get('/user/claimvaksin', [ClaimVaksinController::class, 'index']);
Route::patch('/user/claimvaksin/{id}', [ClaimVaksinController::class, 'update'])->name('update');

// -> Untuk Isolasi Mandiri
Route::get('/user/isolasimandiri', [IsolasiController::class, 'index']);
Route::post('/user/isolasimandiri', [IsolasiController::class, 'store'])->name('store');


// +---------------------------------------------------------------------------------------+ //
//                                   <<< Admin Role >>>
// +---------------------------------------------------------------------------------------+ //

// -> Untuk Data Covid
Route::get('/admin/datapositifcovid', [DataCovidController::class, 'index']);
Route::get('/admin/downloadcovid/{id}', [DataCovidController::class, 'downloadcovid'])->name('downloadcovid');

// -> Untuk Data Vaksin
Route::get('/admin/datavaksin', [DataVaksinController::class, 'index']);

// -> Untuk Data Gejala Covid
Route::get('/admin/datagejala', [DataGejalaController::class, 'index']);

// -> Untuk Data Gejala Covid
Route::get('/admin/dataisolasi', [DataIsolasiController::class, 'index']);



// +---------------------------------------------------------------------------------------+ //
//                                   <<< In Charge Person Routes >>>
// +---------------------------------------------------------------------------------------+ //

// -> Untuk Check Data Pasien
Route::get('/datapersonal/{id}', [DataPersonalController::class, 'show'])->name('show');
Route::get('/datapersonalcovid/{id}', [DataPersonalController::class, 'showCovid'])->name('showCovid');
Route::get('/datapersonalvaksin/{id}', [DataPersonalController::class, 'showVaksin'])->name('showVaksin');
Route::get('/datapersonalgejala/{id}', [DataPersonalController::class, 'showGejala'])->name('showGejala');
Route::get('/datapersonalisolasi/{id}', [DataPersonalController::class, 'showIsolasi'])->name('showIsolasi');