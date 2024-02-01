<?php

use App\Http\Controllers\Admin\PengunjungController as AdminPengunjungController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\User\PengunjungController;
use Illuminate\Support\Facades\Route;

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
    return view('index');
});

Route::post('simpan-bukupengunjung', [PengunjungController::class, 'simpanPengunjung'])->name('simpan-bukupengunjung');

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Route Admin
Route::get('admin/pengunjung', [AdminPengunjungController::class, 'index'])->name('admin-pengunjung');
Route::get('admin/form-tambah', [AdminPengunjungController::class, 'formTambah'])->name('admin-form-tambah');
Route::post('admin/simpan-data', [AdminPengunjungController::class, 'simpanData'])->name('admin-simpan-data');
Route::get('admin/form-edit/{id}', [AdminPengunjungController::class, 'formEdit'])->name('admin-form-edit');
Route::post('admin/update-data', [AdminPengunjungController::class, 'updatePengunjung'])->name('admin-update-data');
Route::post('admin/hapus-data', [AdminPengunjungController::class, 'hapusPengunjung'])->name('admin-hapus-data');
