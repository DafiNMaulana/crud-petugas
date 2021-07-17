<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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

Route::get('/lte', [AdminController::class, 'index'])->name('lte');
Route::get('/input-data', [AdminController::class, 'create'])->name('create-petugas'); //menuju halaman tambah data
Route::post('/input-data', [AdminController::class, 'store'])->name('kirim-petugas');  //meambahkan data
Route::get('/ubah-data/{id}', [AdminController::class, 'edit'])->name('ubah-data'); //menuju halaman ubah data
Route::post('/update-data/{id}', [AdminController::class, 'update'])->name('update-data'); //mengubah data
Route::get('/delete-data/{id}', [AdminController::class, 'destroy'])->name('delete-data'); //mengubah data


