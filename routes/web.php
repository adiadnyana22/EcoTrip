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

Route::get('/', [\App\Http\Controllers\MenuController::class, 'homepage'])->name('home');

Route::get('/wisata', [\App\Http\Controllers\WisataController::class, 'wisataList'])->name('wisataList');

Route::get('/explore', [\App\Http\Controllers\ExploreController::class, 'exploreList'])->name('exploreList');

Route::get('/wisata/{wisata}', [\App\Http\Controllers\WisataController::class, 'wisataDetail'])->name('wisataDetail');

Route::get('/explore/{explore}', [\App\Http\Controllers\ExploreController::class, 'exploreDetail'])->name('exploreDetail');

Route::get('/login', [\App\Http\Controllers\AuthController::class, 'loginPage'])->name('login');
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'loginMtd'])->name('loginMtd');
Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'logoutMtd'])->name('logout');

Route::get('/register', [\App\Http\Controllers\AuthController::class, 'registerPage'])->name('register');
Route::post('/register', [\App\Http\Controllers\AuthController::class, 'registerMtd'])->name('registerMtd');

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

Route::get('/explore/pemesanan/success', [\App\Http\Controllers\PemesananExploreController::class, 'viewPesananSuccess'])->name('exploreSuccess');

Route::get('/wisata/pemesanan/success', [\App\Http\Controllers\PemesananWisataController::class, 'viewPesananSuccess'])->name('wisataSuccess');

Route::get('/waste/1', [\App\Http\Controllers\WasteController::class, 'viewTicketList'])->name('viewWaste1');
Route::post('/waste/1', [\App\Http\Controllers\WasteController::class, 'mtdTicketSelected'])->name('mtdWaste1');
Route::get('/waste/2', [\App\Http\Controllers\WasteController::class, 'viewUploadImage'])->name('viewWaste2');
Route::post('/waste/2', [\App\Http\Controllers\WasteController::class, 'mtdUploadImage'])->name('mtdWaste2');
Route::get('/waste/3', [\App\Http\Controllers\WasteController::class, 'viewReview'])->name('viewWaste3');
Route::post('/waste/3', [\App\Http\Controllers\WasteController::class, 'mtdReview'])->name('mtdWaste3');

Route::get('/waste/success', [\App\Http\Controllers\WasteController::class, 'viewSuccess'])->name('wasteSuccess');

Route::get('/campaign', [\App\Http\Controllers\MenuController::class, 'campaign'])->name('campaign');

Route::get('/faq', [\App\Http\Controllers\MenuController::class, 'faq'])->name('faq');

Route::get('/history', [\App\Http\Controllers\MenuController::class, 'orderList'])->name('history');

Route::get('/profile', [\App\Http\Controllers\MenuController::class, 'profile'])->name('profile');
Route::post('/profile/submit', [\App\Http\Controllers\MenuController::class, 'submitProfile'])->name('submitProfile');

Route::get('/notification', [\App\Http\Controllers\MenuController::class, 'notification'])->name('notification');

Route::get('/wishlist', [\App\Http\Controllers\MenuController::class, 'wishlist'])->name('wishlist');

Route::get('/toggleWisataWishlist', [\App\Http\Controllers\WisataController::class, 'wishlistToggle'])->name('toggleWisataWishlist');
Route::get('/toggleExploreWishlist', [\App\Http\Controllers\ExploreController::class, 'wishlistToggle'])->name('toggleExploreWishlist');

Route::get('/insight', [\App\Http\Controllers\InsightController::class, 'insightList'])->name('insightList');
Route::get('/insight/{insight}', [\App\Http\Controllers\InsightController::class, 'insightDetail'])->name('insightDetail');

Route::get('/voucher', [\App\Http\Controllers\MenuController::class, 'voucher'])->name('voucher');

Route::get('/coin', [\App\Http\Controllers\MenuController::class, 'coin'])->name('coin');