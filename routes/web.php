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
Route::get('/jadwal/{id?}', [SiswaController::class, 'jadwal']);
Route::get('/scan', [SiswaController::class, 'scan']);

Route::get('/scan/{hash}/{id_mapel}/{pertemuan}', [SiswaController::class, 'scanning']);


// route Guru
Route::get('/guru', [GuruController::class, 'index']);
Route::get('/guru/absensi/{id?}', [GuruController::class, 'absensi']);
Route::post('/guru/absensi/{id}', [GuruController::class, 'absensiQR']);


// route Admin
Route::get('/admin', [AdminController::class, 'index']);
Route::get('/admin/master/guru/{username}', [AdminController::class, 'editGuru']);
Route::post('/admin/master/guru/{username}', [AdminController::class, 'editGuruSimpan']);
Route::get('/admin/master/{jenis}', [AdminController::class, 'master']);
Route::post('/admin/master/{jenis}', [AdminController::class, 'masterInput']);
Route::get('/admin/master/{jenis}/{jurusan}/{kelas}/{id?}', [AdminController::class, 'masterPerJurusan']);
Route::post('/admin/master/{jenis}/{jurusan}/{kelas}/{id?}', [AdminController::class, 'masterPerJurusanInput']);


// route Auth
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/login', [AuthController::class, 'loginPage'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/guru/login', [AuthController::class, 'loginPageGuru'])->name('login-guru');
Route::post('/guru/login', [AuthController::class, 'loginGuru']);
Route::get('/admin/login', [AuthController::class, 'loginPageAdmin'])->name('login-admin');
Route::post('/admin/login', [AuthController::class, 'loginAdmin']);

