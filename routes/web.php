<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\GuruController;
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

// route Siswa
Route::get('/', [SiswaController::class, 'index']);
Route::get('/profil', [SiswaController::class, 'profile']);
Route::post('/profil', [SiswaController::class, 'profileSimpan']);
Route::get('/jadwal/{id?}', [SiswaController::class, 'jadwal']);
Route::get('/scan', [SiswaController::class, 'scan']);

Route::get('/scan/{hash}/{id_mapel}/{pertemuan}', [SiswaController::class, 'scanning']);


// route Guru
Route::get('/guru', [GuruController::class, 'index']);
Route::get('/guru/profil', [GuruController::class, 'profile']);
Route::post('/guru/profil', [GuruController::class, 'profileSimpan']);
Route::get('/guru/absensi/{id?}', [GuruController::class, 'absensi']);
Route::post('/guru/absensi/{id}', [GuruController::class, 'absensiQR']);
Route::get('/guru/laporan/{id?}', [GuruController::class, 'laporan']);
Route::get('/guru/laporan/{id}/{pertemuan}/export', [GuruController::class, 'exportLaporanHarian']);


// route Admin
Route::get('/admin', [AdminController::class, 'index']);
Route::get('/admin/profil', [AdminController::class, 'profile']);
Route::post('/admin/profil', [AdminController::class, 'profileSimpan']);
Route::get('/admin/master/guru/{username}', [AdminController::class, 'editGuru']);
Route::post('/admin/master/guru/{username}', [AdminController::class, 'editGuruSimpan']);
Route::delete('/admin/master/guru/{username}/delete', [AdminController::class, 'guruHapus']);
Route::get('/admin/master/{jenis}', [AdminController::class, 'master']);
Route::post('/admin/master/{jenis}', [AdminController::class, 'masterInput']);
Route::get('/admin/master/{jenis}/{jurusan}/{kelas}/{id?}', [AdminController::class, 'masterPerJurusan']);
Route::post('/admin/master/{jenis}/{jurusan}/{kelas}/{id?}', [AdminController::class, 'masterPerJurusanInput']);
Route::delete('/admin/master/{jenis}/{jurusan}/{kelas}/{id}', [AdminController::class, 'masterPerJurusanHapus']);
Route::get('/admin/laporan', [AdminController::class, 'laporan']);
Route::get('/admin/laporan/{jurusan}/{kelas}/{id?}', [AdminController::class, 'laporanMataPelajaran']);


// route Auth
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/login', [AuthController::class, 'loginPage'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/guru/login', [AuthController::class, 'loginPageGuru'])->name('login-guru');
Route::post('/guru/login', [AuthController::class, 'loginGuru']);
Route::get('/admin/login', [AuthController::class, 'loginPageAdmin'])->name('login-admin');
Route::post('/admin/login', [AuthController::class, 'loginAdmin']);

