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

Route::get('/login', function () {
    return view('user.login');
});

Route::get('/register', function () {
    return view('user.register');
});

Route::get('/pemesanan', function () {
    return view('user.pemesanan');
});

Route::get('/pemesanan2', function () {
    return view('user.pemesanan2');
});

Route::get('/pemesanan3', function () {
    return view('user.pemesanan3');
});

Route::post('/wisata/pemesanan/1', [\App\Http\Controllers\PemesananWisataController::class, 'mtdPemesananFromDetail'])->name('pemesananWisata1');
Route::get('/wisata/pemesanan/1', [\App\Http\Controllers\PemesananWisataController::class, 'viewPemesananDataDiri'])->name('viewPemesananWisata1');
Route::post('/wisata/pemesanan/2', [\App\Http\Controllers\PemesananWisataController::class, 'mtdPemesananDataDiri'])->name('pemesananWisata2');
Route::get('/wisata/pemesanan/2', [\App\Http\Controllers\PemesananWisataController::class, 'viewPemesananConfirm'])->name('viewPemesananWisata2');
Route::post('/wisata/pemesanan/3', [\App\Http\Controllers\PemesananWisataController::class, 'mtdPemesananPayment'])->name('pemesananWisata3');
Route::get('/wisata/pemesanan/3', [\App\Http\Controllers\PemesananWisataController::class, 'viewPemesananPayment'])->name('viewPemesananWisata3');

Route::get('/success', function () {
    return view('user.success');
})->name('success');
