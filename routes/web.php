<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PakController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PendidikanController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\KepegawaianController;




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

// Route::get('call-helper', sum_pendidikan1(1));

Route::get('/', [HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function() {
    // Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::get('export', [UserController::class, 'export'])->name('export');
    Route::post('import', [UserController::class, 'import'])->name('import');
    Route::resource('paks', PakController::class);
    Route::resource('kegiatans', KegiatanController::class);
    Route::resource('posts', PostController::class);
    Route::resource('pendidikans', PendidikanController::class);
    Route::resource('jabatans', JabatanController::class);
    Route::resource('kepegawaians', KepegawaianController::class);
    Route::resource('pendidikans', PendidikanController::class)->except([
        'create','index'
    ]);

    Route::get('/index1/{id}', [PendidikanController::class, 'index1'])->name('pendidikans.index1');
    Route::get('/exporDupak/{id}', [PendidikanController::class, 'exporDupak'])->name('pendidikans.exporDupak');
    Route::get('/create1/{id}', [PendidikanController::class, 'create1'])->name('pendidikans.create1');
    Route::POST('/store1/{id}', [PendidikanController::class, 'store1'])->name('pendidikans.store1');
    Route::get('/edit1/{id}', [PendidikanController::class, 'edit1'])->name('pendidikans.edit1');
    Route::put('/update1/{id}', [PendidikanController::class, 'update1'])->name('pendidikans.update1');
    Route::delete('/destroy1/{id}', [PendidikanController::class, 'destroy1'])->name('pendidikans.destroy1');
    Route::get('/naik_pangkat', [PendidikanController::class, 'naik_pangkat'])->name('pendidikans.naik_pangkat');

    // untuk penilai
    Route::get('/penilai', [PakController::class, 'penilai'])->name('paks.penilai');



});
