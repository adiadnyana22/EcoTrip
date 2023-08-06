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
});

Route::get('/wisata', [\App\Http\Controllers\WisataController::class, 'wisataList'])->name('wisataList');

Route::get('/explore', [\App\Http\Controllers\ExploreController::class, 'exploreList'])->name('exploreList');

Route::get('/wisata/{id}', function () {
    return view('user.wisata_detail');
});

Route::get('/explore/{id}', function () {
    return view('user.explore_detail');
});

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
