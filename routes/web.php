<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Data_Mhs;
use App\Http\Livewire\Data_Dosen;
use App\Http\Livewire\Data_Matkul;
use App\Http\Livewire\Data_Kuliah;
use App\Http\Livewire\Data_Krs;
use App\Http\Livewire\AvaMatkul;
use App\Http\Livewire\Jadwal;
use App\Http\Livewire\ReqKuliah;
use App\Http\Livewire\Presensi;
use App\Http\Livewire\inNilai;
use App\Http\Controllers\PDFController;


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

Route::get('/', function () {
    return view('login');
});

Route::group(['middleware' => ['auth:sanctum', 'verified']], function() {
    Route::get('/dashboard', function() {
        return view('dashboard');
    })->name('dashboard');

	Route::get('datamhs', Data_Mhs::class)->name('datamhs');

	Route::get('datadosen', Data_Dosen::class)->name('datadosen');

	Route::get('datamatkul', Data_Matkul::class)->name('datamatkul');

    Route::get('datakuliah', Data_Kuliah::class)->name('datakuliah');

    Route::get('datakrs', Data_Krs::class)->name('datakrs');

    Route::get('infoava', AvaMatkul::class)->name('infoava');

    Route::get('jadwal', Jadwal::class)->name('jadwal');

    Route::get('approve', ReqKuliah::class)->name('approve');

    Route::get('inpresensi', Presensi::class)->name('inpresensi');

    Route::get('in_nilai', inNilai::class)->name('in_nilai');

});

Route::get('cetak_krs', [PDFController::class, 'index'])->name('cetak_krs');
