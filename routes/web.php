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

Route::get('/success', function () {
    return view('user.success');
});

Route::post('/wisata/pemesanan/1', [\App\Http\Controllers\PemesananWisataController::class, 'pemesananFromDetail'])->name('pemesananWisata1');
Route::post('/wisata/pemesanan/2', [\App\Http\Controllers\PemesananWisataController::class, 'pemesananFrom1'])->name('pemesananWisata2');
