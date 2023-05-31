<?php

use App\Http\Controllers\BaJurnalController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\KepegawaianController;
use App\Http\Controllers\Lampiran2pkbController;
use App\Http\Controllers\PakController;
use App\Http\Controllers\PendidikanController;
use App\Http\Controllers\PenilaiController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProvinsiController;
use App\Http\Controllers\RelasiL2pkbUsulanController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;

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

// // Route::get('call-helper', sum_pendidikan1(1));
// if (Auth::user()->hasRole('admin')) {
//     // return redirect()->route('admin.page');
// }else{
//     // return redirect()->route('user.page');
// }
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/lock', [HomeController::class, 'index1'])->name('home1');

// Route::get('/', [HomeController::class, 'index'])->name('home');

Auth::routes();

// Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('blogs', BlogController::class);

Route::group(['middleware' => ['auth']], function () {
    // Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::get('export', [UserController::class, 'export'])->name('export');
    Route::post('import', [UserController::class, 'import'])->name('import');
    Route::resource('paks', PakController::class);
    Route::get('/riwayat', [PakController::class, 'riwayat'])->name('paks.riwayat');

    Route::get('/confirm_terbit/{id}', [PakController::class, 'confirm_terbit'])->name('paks.confirm_terbit');
    Route::get('/cetak_draf/{id}', [PakController::class, 'cetak_draf_pak'])->name('paks.cetak_draf_pak');

    Route::resource('kegiatans', KegiatanController::class);
    Route::resource('posts', PostController::class);
    Route::resource('jabatans', JabatanController::class);
    Route::resource('kepegawaians', KepegawaianController::class);

    Route::resource('lampiran2pkbs', Lampiran2pkbController::class);

    Route::resource('pendidikans', PendidikanController::class)->except([
        'create', 'index',
    ]);

    Route::get('/index1/{id}', [PendidikanController::class, 'index1'])->name('pendidikans.index1');
    Route::get('/exporDupak/{id}', [PendidikanController::class, 'exporDupak'])->name('pendidikans.exporDupak');
    Route::get('/create1/{id}', [PendidikanController::class, 'create1'])->name('pendidikans.create1');
    Route::POST('/store1/{id}', [PendidikanController::class, 'store1'])->name('pendidikans.store1');
    Route::get('/edit1/{id}', [PendidikanController::class, 'edit1'])->name('pendidikans.edit1');
    Route::put('/update1/{id}', [PendidikanController::class, 'update1'])->name('pendidikans.update1');
    Route::delete('/destroy1/{id}', [PendidikanController::class, 'destroy1'])->name('pendidikans.destroy1');

    Route::put('/update_pak/{id}', [UserController::class, 'update_pak'])->name('users.update_pak');

    Route::get('/angka_kredit', [PenilaiController::class, 'angka_kredit'])->name('penilais.angka_kredit');

    Route::get('/pesan_perbaikan/{id}', [ProvinsiController::class, 'pesan_perbaikan'])->name('provinsis.pesan_perbaikan');

    // untuk penilai
    Route::get('/data_kenpa', [PenilaiController::class, 'data_kenpa'])->name('penilais.data_kenpa');

    Route::group(['middleware' => ['role:guru|admin']], function () {

        Route::resource('paks', PakController::class);
        Route::resource('pendidikans', PendidikanController::class);
        Route::get('/naik_pangkat', [PendidikanController::class, 'naik_pangkat'])->name('pendidikans.naik_pangkat');
        Route::put('/usul_naik_pangkat/{id}', [PenilaiController::class, 'usul_naik_pangkat'])->name('penilais.usul_naik_pangkat');

    });

    Route::group(['middleware' => ['role:penilai|admin-prov']], function () {
        //
        Route::get('/penilai', [PenilaiController::class, 'penilai'])->name('penilais.penilai');
        Route::get('/penilai_tahunan', [PenilaiController::class, 'penilai_tahunan'])->name('penilais.penilai_tahunan');
        Route::get('/pak_detail/{id}', [PenilaiController::class, 'pak_detail'])->name('penilais.pak_detail');
        Route::get('/cetak_berita_acara/{id}', [PenilaiController::class, 'cetak_berita_acara'])->name('penilais.cetak_berita_acara');
        Route::get('/cetak_ba_jurnal/{id}', [PenilaiController::class, 'cetak_ba_jurnal'])->name('penilais.cetak_ba_jurnal');
        Route::put('/update_pak_penilai/{id}', [PenilaiController::class, 'update_pak_penilai'])->name('penilais.update_pak_penilai');
        Route::get('/cetak_pak/{id}', [PenilaiController::class, 'cetak_pak'])->name('penilais.cetak_pak');
        Route::get('/cetak_asli/{id}', [PenilaiController::class, 'cetak_asli'])->name('penilais.cetak_asli');
        Route::get('/cetak_hapak/{id}', [PenilaiController::class, 'cetak_hapak'])->name('penilais.cetak_hapak');
        Route::get('/pleno', [PenilaiController::class, 'pleno'])->name('penilais.pleno');
        Route::get('/pleno_tahunan', [PenilaiController::class, 'pleno_tahunan'])->name('penilais.pleno_tahunan');
        Route::get('/export_pleno', [PenilaiController::class, 'export'])->name('penilais.export_pleno');
        Route::get('/export_pleno_2', [PenilaiController::class, 'export_2'])->name('penilais.export_pleno_2');
        Route::get('/export_pleno_tahunan', [PenilaiController::class, 'export_tahunan'])->name('penilais.export_pleno_tahunan');
        Route::get('/export_pleno_tahunan_2', [PenilaiController::class, 'export_tahunan_2'])->name('penilais.export_pleno_tahunan_2');
        Route::get('/vermak/{id}', [PenilaiController::class, 'vermak'])->name('penilais.vermak');
        Route::get('/verifikasi', [ProvinsiController::class, 'verifikasi'])->name('provinsis.verifikasi');
        Route::get('/verifikasi_tahunan', [ProvinsiController::class, 'verifikasi_tahunan'])->name('provinsis.verifikasi_tahunan');
        Route::get('/verif/{id}', [ProvinsiController::class, 'verif'])->name('provinsis.verif');

        Route::put('/perbaikan/{id}', [ProvinsiController::class, 'perbaikan'])->name('provinsis.perbaikan');
        Route::put('/tolak/{id}', [ProvinsiController::class, 'tolak'])->name('provinsis.tolak');
        Route::get('/lap_pi/{id}', [ProvinsiController::class, 'lap_pi'])->name('provinsis.lap_pi');
        Route::get('/jurnal/{id}', [ProvinsiController::class, 'jurnal'])->name('provinsis.jurnal');
        Route::put('/saran/{id}', [ProvinsiController::class, 'saran'])->name('provinsis.saran');
        Route::put('/no_sk/{id}', [ProvinsiController::class, 'no_sk'])->name('provinsis.no_sk');
        Route::put('/no_sk_asli/{id}', [ProvinsiController::class, 'no_sk_asli'])->name('provinsis.no_sk_asli');

        Route::get('/index/{id}', [RelasiL2pkbUsulanController::class, 'index'])->name('l2pkb.index');
        Route::get('/alasan/{id}', [RelasiL2pkbUsulanController::class, 'alasan'])->name('l2pkb.alasan');
        Route::POST('/store', [RelasiL2pkbUsulanController::class, 'store'])->name('l2pkb.store');
        Route::delete('/destroy/{id}', [RelasiL2pkbUsulanController::class, 'destroy'])->name('l2pkb.destroy');

        Route::get('/index', [SettingController::class, 'index'])->name('settings.index');
        Route::get('/create', [SettingController::class, 'create'])->name('settings.create');
        Route::POST('/store1', [SettingController::class, 'store1'])->name('settings_controller.store1');
        Route::get('/edit', [SettingController::class, 'edit'])->name('settings.edit');
        Route::put('/update/{id}', [SettingController::class, 'update'])->name('settings.update');

        Route::get('/index2/{id}', [BaJurnalController::class, 'index'])->name('ba_jurnals.index');
        Route::get('/index3/{id}', [BaJurnalController::class, 'index3'])->name('ba_jurnals.index3');
        Route::POST('/store/{id}', [BaJurnalController::class, 'store'])->name('ba_jurnals.store');
        Route::delete('/destroy2/{id}', [BaJurnalController::class, 'destroy'])->name('ba_jurnals.destroy');
    });

});
