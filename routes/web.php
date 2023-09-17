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

Route::get('/', function () {
    return view('user.index');
})->name('home');

Route::get('/wisata', [\App\Http\Controllers\WisataController::class, 'wisataList'])->name('wisataList');

Route::get('/explore', [\App\Http\Controllers\ExploreController::class, 'exploreList'])->name('exploreList');

Route::get('/wisata/{wisata}', [\App\Http\Controllers\WisataController::class, 'wisataDetail'])->name('wisataDetail');

Route::get('/explore/{explore}', [\App\Http\Controllers\ExploreController::class, 'exploreDetail'])->name('exploreDetail');

Route::get('/login', [\App\Http\Controllers\AuthController::class, 'loginPage'])->name('login');
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'loginMtd'])->name('loginMtd');
Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'logoutMtd'])->name('logout');

Route::get('/register', [\App\Http\Controllers\AuthController::class, 'registerPage'])->name('register');

Route::post('/wisata/pemesanan/1', [\App\Http\Controllers\PemesananWisataController::class, 'mtdPemesananFromDetail'])->name('pemesananWisata1');
Route::get('/wisata/pemesanan/1', [\App\Http\Controllers\PemesananWisataController::class, 'viewPemesananDataDiri'])->name('viewPemesananWisata1');
Route::post('/wisata/pemesanan/2', [\App\Http\Controllers\PemesananWisataController::class, 'mtdPemesananDataDiri'])->name('pemesananWisata2');
Route::get('/wisata/pemesanan/2', [\App\Http\Controllers\PemesananWisataController::class, 'viewPemesananConfirm'])->name('viewPemesananWisata2');
Route::post('/wisata/pemesanan/3', [\App\Http\Controllers\PemesananWisataController::class, 'mtdPemesananPayment'])->name('pemesananWisata3');
Route::get('/wisata/pemesanan/3', [\App\Http\Controllers\PemesananWisataController::class, 'viewPemesananPayment'])->name('viewPemesananWisata3');

Route::post('/explore/pemesanan/1', [\App\Http\Controllers\PemesananExploreController::class, 'mtdPemesananFromDetail'])->name('pemesananExplore1');
Route::get('/explore/pemesanan/1', [\App\Http\Controllers\PemesananExploreController::class, 'viewPemesananDataDiri'])->name('viewPemesananExplore1');
Route::post('/explore/pemesanan/2', [\App\Http\Controllers\PemesananExploreController::class, 'mtdPemesananDataDiri'])->name('pemesananExplore2');
Route::get('/explore/pemesanan/2', [\App\Http\Controllers\PemesananExploreController::class, 'viewPemesananMeetingPoint'])->name('viewPemesananExplore2');
Route::post('/explore/pemesanan/3', [\App\Http\Controllers\PemesananExploreController::class, 'mtdPemesananMeetingPoint'])->name('pemesananExplore3');
Route::get('/explore/pemesanan/3', [\App\Http\Controllers\PemesananExploreController::class, 'viewPemesananConfirm'])->name('viewPemesananExplore3');
Route::post('/explore/pemesanan/4', [\App\Http\Controllers\PemesananExploreController::class, 'mtdPemesananPayment'])->name('pemesananExplore4');
Route::get('/explore/pemesanan/4', [\App\Http\Controllers\PemesananExploreController::class, 'viewPemesananPayment'])->name('viewPemesananExplore4');

Route::get('explore/pemesanan/success', [\App\Http\Controllers\PemesananExploreController::class, 'viewPesananSuccess'])->name('exploreSuccess');

Route::get('/wisata/pemesanan/success', [\App\Http\Controllers\PemesananWisataController::class, 'viewPesananSuccess'])->name('wisataSuccess');


