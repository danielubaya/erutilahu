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

//URL::forceRootUrl('https://erutilahu.cktr.web.id/');
Auth::routes();

// Login Routes...
Route::get('admin-login', 'Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('admin-login', 'Admin\LoginController@login');

// Logout Routes...
Route::post('admin-logout', 'Admin\LoginController@logout')->name('admin.logout');

// Registration Routes...
Route::get('admin-register', 'Admin\RegisterController@showRegistrationForm')->name('admin.register');
Route::post('admin-register', 'Admin\RegisterController@register');

// Password Reset Routes...
Route::get('admin-password/reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('admin-password/email', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('admin-password/reset/{token}', 'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
Route::post('admin-password/reset', 'Admin\ResetPasswordController@reset')->name('admin.password.update');

// Password Confirmation Routes...
Route::get('admin-password/confirm', 'Admin\ConfirmPasswordController@showConfirmForm')->name('admin.password.confirm');
Route::post('admin-password/confirm', 'Admin\ConfirmPasswordController@confirm');

// Email Verification Routes...
Route::get('admin-email/verify', 'Admin\VerificationController@show')->name('admin.verification.notice');
Route::get('admin-email/verify/{id}/{hash}', 'Admin\VerificationController@verify')->name('admin.verification.verify');
Route::post('admin-email/resend', 'Auth\VerificationController@resend')->name('admin.verification.resend');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('new_usulan', [App\Http\Controllers\UsulanController::class, 'new_usulan']);	    
    Route::get('usulan_baru', [App\Http\Controllers\UsulanController::class, 'usulan_baru']);	
    Route::post('tambah_usulan', [App\Http\Controllers\UsulanController::class, 'tambah_usulan']);	
    Route::post('kirim_ke_dinas', [App\Http\Controllers\UsulanController::class, 'kirim_ke_dinas']);	
    Route::post('update_nosurat', [App\Http\Controllers\UsulanController::class, 'update_nosurat']);	
    
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
    
    Route::post('upload_file_ba', [App\Http\Controllers\UsulanController::class, 'upload_file_ba']);	
    Route::get('daftar_file_ba/{folder}/{target}', [App\Http\Controllers\UsulanController::class, 'daftar_file_ba']);	
    Route::post('hapus_file_ba', [App\Http\Controllers\UsulanController::class, 'hapus_file_ba']);	
    
    Route::get('usulan_masuk/{kelurahan}', [App\Http\Controllers\UsulanController::class, 'usulan_masuk']);	
    Route::post('kirim_ke_kelurahan', [App\Http\Controllers\UsulanController::class, 'kirim_ke_kelurahan']);	
    Route::post('kirim_ke_kotak', [App\Http\Controllers\UsulanController::class, 'kirim_ke_kotak']);	
    Route::post('kirim_ke_ranking', [App\Http\Controllers\UsulanController::class, 'kirim_ke_ranking']);	
    Route::post('update_rank', [App\Http\Controllers\UsulanController::class, 'update_rank']);	
    Route::post('kirim_rank', [App\Http\Controllers\UsulanController::class, 'kirim_rank']);	
    
    Route::get('usulan_dicek', [App\Http\Controllers\UsulanController::class, 'usulan_dicek']);	
    Route::get('usulan_ranking', [App\Http\Controllers\UsulanController::class, 'usulan_ranking']);	
    Route::get('usulan_ranking_ro/{kelurahan}', [App\Http\Controllers\UsulanController::class, 'usulan_ranking_ro']);	
    
    Route::get('filter_usulan/{tahap}', [App\Http\Controllers\UsulanController::class, 'filter_usulan']);	
    Route::get('usulan_kelurahan/{kelurahan}', [App\Http\Controllers\UsulanController::class, 'usulan_kelurahan']);	
    
    Route::get('usulan_nonrutil/{kelurahan}', [App\Http\Controllers\UsulanController::class, 'usulan_nonrutil']);	
    
    Route::get('usulan_daftartunggu/{kelurahan}', [App\Http\Controllers\UsulanController::class, 'usulan_daftartunggu']);	
    Route::post('mulai_pengerjaan', [App\Http\Controllers\UsulanController::class, 'mulai_pengerjaan']);	
    
    Route::get('usulan_pengerjaan/{kelurahan}', [App\Http\Controllers\UsulanController::class, 'usulan_pengerjaan']);	
    Route::post('selesai_pengerjaan', [App\Http\Controllers\UsulanController::class, 'selesai_pengerjaan']);	
    
    Route::get('usulan_selesai/{kelurahan}', [App\Http\Controllers\UsulanController::class, 'usulan_selesai']);	
    
    Route::get('peta_usulan', [App\Http\Controllers\UsulanController::class, 'peta_usulan']);	
   
    Route::get('logout', [App\Http\Controllers\UsulanController::class, 'logout']);	
    
});