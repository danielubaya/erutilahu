<?php

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


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('new_usulan', [App\Http\Controllers\UsulanController::class, 'new_usulan']);	    
    Route::get('usulan_baru', [App\Http\Controllers\UsulanController::class, 'usulan_baru']);	
    Route::post('tambah_usulan', [App\Http\Controllers\UsulanController::class, 'tambah_usulan']);	
    Route::post('kirim_ke_dinas', [App\Http\Controllers\UsulanController::class, 'kirim_ke_dinas']);	
   
    Route::get('show_xy/{id}', [App\Http\Controllers\UsulanController::class, 'show_xy']);	
    Route::get('isi_modal_setxy/{id}', [App\Http\Controllers\UsulanController::class, 'isi_modal_setxy']);	
    Route::post('update_xy', [App\Http\Controllers\UsulanController::class, 'update_xy']);	
    
    Route::get('show_profil/{id}', [App\Http\Controllers\UsulanController::class, 'show_profil']);	
    Route::get('isi_modal_set_profil/{id}', [App\Http\Controllers\UsulanController::class, 'isi_modal_set_profil']);	
    Route::post('update_profil_rumah', [App\Http\Controllers\UsulanController::class, 'update_profil_rumah']);	
    
    Route::get('isi_modal_upload_dokumen/{id}', [App\Http\Controllers\UsulanController::class, 'isi_modal_upload_dokumen']);	
    Route::post('upload_file', [App\Http\Controllers\UsulanController::class, 'upload_file']);	
    Route::get('daftar_file/{folder}/{target}', [App\Http\Controllers\UsulanController::class, 'daftar_file']);	
    Route::post('hapus_file', [App\Http\Controllers\UsulanController::class, 'hapus_file']);	
    Route::get('list_dokumen/{id}/{target}', [App\Http\Controllers\UsulanController::class, 'list_dokumen']);	
    
    Route::get('usulan_masuk', [App\Http\Controllers\UsulanController::class, 'usulan_masuk']);	
    
    Route::get('usulan_dicek', [App\Http\Controllers\UsulanController::class, 'usulan_dicek']);	
    Route::get('usulan_ranking', [App\Http\Controllers\UsulanController::class, 'usulan_ranking']);	
    
    Route::get('filter_usulan', [App\Http\Controllers\UsulanController::class, 'filter_usulan']);	
    Route::get('usulan_kelurahan/{kelurahan}', [App\Http\Controllers\UsulanController::class, 'usulan_kelurahan']);	
    

    Route::get('peta_usulan', [App\Http\Controllers\UsulanController::class, 'peta_usulan']);	
   
    Route::get('logout', [App\Http\Controllers\UsulanController::class, 'logout']);	
    
});