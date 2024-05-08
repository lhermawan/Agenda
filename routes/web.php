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

Route::get('/dashboard', [App\Http\Controllers\LandingpageController::class, 'index'])->name('dashboard');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('ssl', [App\Http\Controllers\SslController::class, 'index'])->name('ssl');
Route::get('website', [App\Http\Controllers\WebsiteController::class, 'index'])->name('website');
Route::get('/website/cari', [App\Http\Controllers\WebsiteController::class, 'cari'])->name('website/cari');
Route::get('/website/filter', [App\Http\Controllers\WebsiteController::class, 'filter'])->name('website/filter');
Route::group(['namespace' => 'App\Http\Controllers'], function()
{
    /**
     * Home Routes
     */


    Route::group(['middleware' => ['guest']], function() {
        /**
         * Register Routes
         */
        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform');

        /**
         * Login Routes
         */
        Route::get('/login', 'LoginController@show')->name('login.show');
        Route::post('/login', 'LoginController@login')->name('login.perform');

    });

    Route::group(['middleware' => ['auth']], function() {
        /**
         * Logout Routes
         */
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
    });
});
// -----------------------------post Cabor----------------------------------------//
Route::get('admin/post/data_post', [App\Http\Controllers\PostController::class, 'index'])->name('admin/post/data_post');
Route::get('admin/post/tambah_post', [App\Http\Controllers\PostController::class, 'Tambahpost'])->name('admin/post/tambah_post');
Route::post('savepost', [App\Http\Controllers\PostController::class, 'savepost'])->name('savepost');
Route::get('admin/post/edit_post/{id}', [App\Http\Controllers\PostController::class, 'viewEdit'])->middleware('auth');
Route::post('admin/post/update', [App\Http\Controllers\PostController::class, 'updatepost'])->name('admin/post/update');
Route::delete('deletepost', [App\Http\Controllers\PostController::class, 'deletepost'])->name('deletepost');

// -----------------------------Regulasi----------------------------------------//
Route::get('admin/regulasi/regulasi', [App\Http\Controllers\RegulasiController::class, 'index'])->name('admin/regulasi/regulasi');
Route::post('saveRegulasi', [App\Http\Controllers\RegulasiController::class, 'saveRegulasi'])->name('saveRegulasi');
Route::delete('deleteRegulasi', [App\Http\Controllers\RegulasiController::class, 'deleteRegulasi'])->name('deleteRegulasi');
Route::get('admin/regulasi/download_file/{id}', [App\Http\Controllers\RegulasiController::class, 'Download'])->middleware('auth');

// -----------------------------Kategori Post----------------------------------------//
Route::get('admin/post/kategori_post', [App\Http\Controllers\KategoriPostController::class, 'index'])->name('admin/post/kategori_post');
Route::post('saveKategoriPost', [App\Http\Controllers\KategoriPostController::class, 'saveKategoriPost'])->name('saveKategoriPost');
Route::post('admin/post/kategori_update', [App\Http\Controllers\KategoriPostController::class, 'updateKategoriPost'])->name('admin/post/kategori_update');
Route::delete('deleteKategoriPost', [App\Http\Controllers\KategoriPostController::class, 'deleteKategoriPost'])->name('deleteKategoriPost');

// -----------------------------Event----------------------------------------//
Route::get('admin/event/data_event', [App\Http\Controllers\EventController::class, 'index'])->name('admin/event/data_event');
Route::get('admin/event/tambah_post', [App\Http\Controllers\EventController::class, 'Tambahevent'])->name('admin/event/tambah_event');
Route::post('saveevent', [App\Http\Controllers\EventController::class, 'saveevent'])->name('saveevent');
Route::get('admin/event/edit_post/{id}', [App\Http\Controllers\EventController::class, 'viewEdit'])->middleware('auth');
Route::post('admin/event/update', [App\Http\Controllers\EventController::class, 'updateevent'])->name('admin/event/update');
Route::delete('deleteevent', [App\Http\Controllers\EventController::class, 'deleteevent'])->name('deleteevent');


Route::get('post/post', [App\Http\Controllers\BeritaController::class, 'index'])->name('post_page');

// -----------------------------Agenda----------------------------------------//
Route::get('admin/agenda/agenda', [App\Http\Controllers\AgendaController::class, 'index'])->name('admin/agenda/agenda');
Route::post('saveAgenda', [App\Http\Controllers\AgendaController::class, 'saveAgenda'])->name('saveAgenda');
Route::post('admin/agenda/agenda_update', [App\Http\Controllers\AgendaController::class, 'updateAgenda'])->name('admin/agenda/agenda_update');
Route::delete('deleteAgenda', [App\Http\Controllers\AgendaController::class, 'deleteAgenda'])->name('deleteAgenda');
Route::get('admin/agenda/tambah_agenda', [App\Http\Controllers\AgendaController::class, 'Tambahagenda'])->name('admin/agenda/tambah_agenda');
