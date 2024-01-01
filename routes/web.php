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

Route::get('/search', [\App\Http\Controllers\MenuController::class, 'search'])->name('search');

Route::get('/wisata', [\App\Http\Controllers\WisataController::class, 'wisataList'])->name('wisataList');
Route::get('/wisata/{wisata}', [\App\Http\Controllers\WisataController::class, 'wisataDetail'])->name('wisataDetail');

Route::get('/explore', [\App\Http\Controllers\ExploreController::class, 'exploreList'])->name('exploreList');
Route::get('/explore/{explore}', [\App\Http\Controllers\ExploreController::class, 'exploreDetail'])->name('exploreDetail');

Route::get('/campaign', [\App\Http\Controllers\MenuController::class, 'campaign'])->name('campaign');

Route::get('/faq', [\App\Http\Controllers\MenuController::class, 'faq'])->name('faq');

Route::get('/insight', [\App\Http\Controllers\InsightController::class, 'insightList'])->name('insightList');
Route::get('/insight/{insight}', [\App\Http\Controllers\InsightController::class, 'insightDetail'])->name('insightDetail');
Route::get('/insight/{insight}/content', [\App\Http\Controllers\InsightController::class, 'insightDetailContent'])->name('insightDetailContent');

Route::middleware(['userAuth'])->group(function () {
    Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'logoutMtd'])->name('logout');

    Route::get('/voucher', [\App\Http\Controllers\MenuController::class, 'voucher'])->name('voucher');
    Route::get('/coin', [\App\Http\Controllers\MenuController::class, 'coin'])->name('coin');
    Route::get('/history', [\App\Http\Controllers\MenuController::class, 'orderList'])->name('history');
    Route::get('/notification', [\App\Http\Controllers\MenuController::class, 'notification'])->name('notification');

    Route::get('/profile', [\App\Http\Controllers\MenuController::class, 'profile'])->name('profile');
    Route::post('/profile/submit', [\App\Http\Controllers\MenuController::class, 'submitProfile'])->name('submitProfile');

    Route::get('/wishlist', [\App\Http\Controllers\MenuController::class, 'wishlist'])->name('wishlist');
    Route::get('/toggleWisataWishlist', [\App\Http\Controllers\WisataController::class, 'wishlistToggle'])->name('toggleWisataWishlist');
    Route::get('/toggleExploreWishlist', [\App\Http\Controllers\ExploreController::class, 'wishlistToggle'])->name('toggleExploreWishlist');

    Route::middleware(['userOnlyAuth'])->group(function () {
        Route::post('/wisata/pemesanan/1', [\App\Http\Controllers\PemesananWisataController::class, 'mtdPemesananFromDetail'])->name('pemesananWisata1');
        Route::get('/wisata/pemesanan/1', [\App\Http\Controllers\PemesananWisataController::class, 'viewPemesananDataDiri'])->name('viewPemesananWisata1');
        Route::post('/wisata/pemesanan/2', [\App\Http\Controllers\PemesananWisataController::class, 'mtdPemesananDataDiri'])->name('pemesananWisata2');
        Route::get('/wisata/pemesanan/2', [\App\Http\Controllers\PemesananWisataController::class, 'viewPemesananConfirm'])->name('viewPemesananWisata2');
        Route::post('/wisata/pemesanan/3', [\App\Http\Controllers\PemesananWisataController::class, 'mtdPemesananPayment'])->name('pemesananWisata3');
        Route::get('/wisata/pemesanan/3', [\App\Http\Controllers\PemesananWisataController::class, 'viewPemesananPayment'])->name('viewPemesananWisata3');
        Route::get('/wisata/pemesanan/success', [\App\Http\Controllers\PemesananWisataController::class, 'viewPesananSuccess'])->name('wisataSuccess');

        Route::post('/explore/pemesanan/1', [\App\Http\Controllers\PemesananExploreController::class, 'mtdPemesananFromDetail'])->name('pemesananExplore1');
        Route::get('/explore/pemesanan/1', [\App\Http\Controllers\PemesananExploreController::class, 'viewPemesananDataDiri'])->name('viewPemesananExplore1');
        Route::post('/explore/pemesanan/2', [\App\Http\Controllers\PemesananExploreController::class, 'mtdPemesananDataDiri'])->name('pemesananExplore2');
        Route::get('/explore/pemesanan/2', [\App\Http\Controllers\PemesananExploreController::class, 'viewPemesananMeetingPoint'])->name('viewPemesananExplore2');
        Route::post('/explore/pemesanan/3', [\App\Http\Controllers\PemesananExploreController::class, 'mtdPemesananMeetingPoint'])->name('pemesananExplore3');
        Route::get('/explore/pemesanan/3', [\App\Http\Controllers\PemesananExploreController::class, 'viewPemesananConfirm'])->name('viewPemesananExplore3');
        Route::post('/explore/pemesanan/4', [\App\Http\Controllers\PemesananExploreController::class, 'mtdPemesananPayment'])->name('pemesananExplore4');
        Route::get('/explore/pemesanan/4', [\App\Http\Controllers\PemesananExploreController::class, 'viewPemesananPayment'])->name('viewPemesananExplore4');
        Route::get('/explore/pemesanan/success', [\App\Http\Controllers\PemesananExploreController::class, 'viewPesananSuccess'])->name('exploreSuccess');    

        Route::get('/waste/1', [\App\Http\Controllers\WasteController::class, 'viewTicketList'])->name('viewWaste1');
        Route::post('/waste/1', [\App\Http\Controllers\WasteController::class, 'mtdTicketSelected'])->name('mtdWaste1');
        Route::get('/waste/2', [\App\Http\Controllers\WasteController::class, 'viewUploadImage'])->name('viewWaste2');
        Route::post('/waste/2', [\App\Http\Controllers\WasteController::class, 'mtdUploadImage'])->name('mtdWaste2');
        Route::get('/waste/3', [\App\Http\Controllers\WasteController::class, 'viewReview'])->name('viewWaste3');
        Route::post('/waste/3', [\App\Http\Controllers\WasteController::class, 'mtdReview'])->name('mtdWaste3');
        Route::get('/waste/success', [\App\Http\Controllers\WasteController::class, 'viewSuccess'])->name('wasteSuccess');
    });
});

Route::middleware(['guestAuth'])->group(function () {
    Route::get('/login', [\App\Http\Controllers\AuthController::class, 'loginPage'])->name('login');
    Route::post('/login', [\App\Http\Controllers\AuthController::class, 'loginMtd'])->name('loginMtd');

    Route::get('/register', [\App\Http\Controllers\AuthController::class, 'registerPage'])->name('register');
    Route::post('/register', [\App\Http\Controllers\AuthController::class, 'registerMtd'])->name('registerMtd');
});

Route::middleware(['adminAuth'])->group(function () {
    Route::get('/admin/dashboard', [\App\Http\Controllers\AdminHomeController::class, 'index'])->name('adminDashboard');

    Route::get('/admin/carousel', [\App\Http\Controllers\AdminCarouselController::class, 'carouselListPage'])->name('adminCarousel');
    Route::get('/admin/carousel/add', [\App\Http\Controllers\AdminCarouselController::class, 'carouselAddPage'])->name('adminCarouselAdd');
    Route::post('/api/carousel/add', [\App\Http\Controllers\AdminCarouselController::class, 'carouselAddMethod'])->name('adminCarouselAddMethod');
    Route::get('/admin/carousel/detail/{carousel}', [\App\Http\Controllers\AdminCarouselController::class, 'carouselDetailPage'])->name('adminCarouselDetail');
    Route::delete('/api/carousel/delete/{carousel}', [\App\Http\Controllers\AdminCarouselController::class, 'carouselDeleteMethod'])->name('adminCarouselDeleteMethod');
    Route::get('/admin/carousel/edit/{carousel}', [\App\Http\Controllers\AdminCarouselController::class, 'carouselEditPage'])->name('adminCarouselEdit');
    Route::put('/api/carousel/edit/{carousel}', [\App\Http\Controllers\AdminCarouselController::class, 'carouselEditMethod'])->name('adminCarouselEditMethod');

    Route::get('/admin/insight', [\App\Http\Controllers\AdminInsightController::class, 'insightListPage'])->name('adminInsight');
    Route::get('/admin/insight/detail/{insight}', [\App\Http\Controllers\AdminInsightController::class, 'insightDetailPage'])->name('adminInsightDetail');
    Route::get('/admin/insight/add', [\App\Http\Controllers\AdminInsightController::class, 'insightAddPage'])->name('adminInsightAdd');
    Route::post('/api/insight/add', [\App\Http\Controllers\AdminInsightController::class, 'insightAddMethod'])->name('adminInsightAddMethod');
    Route::get('/admin/insight/edit/{insight}', [\App\Http\Controllers\AdminInsightController::class, 'insightEditPage'])->name('adminInsightEdit');
    Route::put('/api/insight/edit/{insight}', [\App\Http\Controllers\AdminInsightController::class, 'insightEditMethod'])->name('adminInsightEditMethod');
    Route::delete('/api/insight/delete/{insight}', [\App\Http\Controllers\AdminInsightController::class, 'insightDeleteMethod'])->name('adminInsightDeleteMethod');

    Route::get('/admin/voucher', [\App\Http\Controllers\AdminVoucherController::class, 'voucherListPage'])->name('adminVoucher');
    Route::get('/admin/voucher/add', [\App\Http\Controllers\AdminVoucherController::class, 'voucherAddPage'])->name('adminVoucherAdd');
    Route::post('/api/voucher/add', [\App\Http\Controllers\AdminVoucherController::class, 'voucherAddMethod'])->name('adminVoucherAddMethod');
    Route::get('/admin/voucher/edit/{voucher}', [\App\Http\Controllers\AdminVoucherController::class, 'voucherEditPage'])->name('adminVoucherEdit');
    Route::put('/api/voucher/edit/{voucher}', [\App\Http\Controllers\AdminVoucherController::class, 'voucherEditMethod'])->name('adminVoucherEditMethod');
    Route::delete('/api/voucher/delete/{voucher}', [\App\Http\Controllers\AdminVoucherController::class, 'voucherDeleteMethod'])->name('adminVoucherDeleteMethod');

    Route::get('/admin/meeting', [\App\Http\Controllers\AdminExploreController::class, 'meetingListPage'])->name('adminExploreMeeting');
    Route::get('/admin/meeting/add', [\App\Http\Controllers\AdminExploreController::class, 'meetingAddPage'])->name('adminExploreMeetingAdd');
    Route::post('/api/meeting/add', [\App\Http\Controllers\AdminExploreController::class, 'meetingAddMethod'])->name('adminExploreMeetingAddMethod');
    Route::get('/admin/meeting/detail/{point}', [\App\Http\Controllers\AdminExploreController::class, 'meetingDetailPage'])->name('adminExploreMeetingDetail');
    Route::get('/admin/meeting/edit/{point}', [\App\Http\Controllers\AdminExploreController::class, 'meetingEditPage'])->name('adminExploreMeetingEdit');
    Route::put('/api/meeting/edit/{point}', [\App\Http\Controllers\AdminExploreController::class, 'meetingEditMethod'])->name('adminExploreMeetingEditMethod');
    Route::delete('/api/meeting/delete/{point}', [\App\Http\Controllers\AdminExploreController::class, 'meetingDeleteMethod'])->name('adminExploreMeetingDeleteMethod');

    Route::get('/admin/wisata', [\App\Http\Controllers\AdminWisataController::class, 'wisataListPage'])->name('adminWisata');
    Route::get('/admin/wisata/detail/{wisata}', [\App\Http\Controllers\AdminWisataController::class, 'wisataDetailPage'])->name('adminWisataDetail');
    Route::get('/admin/wisata/add', [\App\Http\Controllers\AdminWisataController::class, 'wisataAddPage'])->name('adminWisataAdd');
    Route::post('/api/wisata/add', [\App\Http\Controllers\AdminWisataController::class, 'wisataAddMethod'])->name('adminWisataAddMethod');
    Route::get('/admin/wisata/edit/{wisata}', [\App\Http\Controllers\AdminWisataController::class, 'wisataEditPage'])->name('adminWisataEdit');
    Route::put('/api/wisata/edit/{wisata}', [\App\Http\Controllers\AdminWisataController::class, 'wisataEditMethod'])->name('adminWisataEditMethod');
    Route::delete('/api/wisata/delete/{wisata}', [\App\Http\Controllers\AdminWisataController::class, 'wisataDeleteMethod'])->name('adminWisataDeleteMethod');
    Route::get('/api/wisata/picture/delete/{wisataPicture}', [\App\Http\Controllers\AdminWisataController::class, 'wisataImageDeleteMethod'])->name('adminWisataImageDeleteMethod');

    Route::get('/admin/explore', [\App\Http\Controllers\AdminExploreController::class, 'exploreListPage'])->name('adminExplore');
    Route::get('/admin/explore/detail/{explore}', [\App\Http\Controllers\AdminExploreController::class, 'exploreDetailPage'])->name('adminExploreDetail');
    Route::get('/admin/explore/add', [\App\Http\Controllers\AdminExploreController::class, 'exploreAddPage'])->name('adminExploreAdd');
    Route::post('/api/explore/add', [\App\Http\Controllers\AdminExploreController::class, 'exploreAddMethod'])->name('adminExploreAddMethod');
    Route::get('/admin/explore/edit/{explore}', [\App\Http\Controllers\AdminExploreController::class, 'exploreEditPage'])->name('adminExploreEdit');
    Route::put('/api/explore/edit/{explore}', [\App\Http\Controllers\AdminExploreController::class, 'exploreEditMethod'])->name('adminExploreEditMethod');
    Route::delete('/api/explore/delete/{explore}', [\App\Http\Controllers\AdminExploreController::class, 'exploreDeleteMethod'])->name('adminExploreDeleteMethod');
    Route::get('/api/explore/picture/delete/{explorePicture}', [\App\Http\Controllers\AdminExploreController::class, 'exploreImageDeleteMethod'])->name('adminExploreImageDeleteMethod');

    Route::get('/admin/order/wisata', [\App\Http\Controllers\AdminOrderController::class, 'orderWisataListPage'])->name('adminOrderWisata');
    Route::get('/admin/order/wisata/detail/{order}', [\App\Http\Controllers\AdminOrderController::class, 'orderWisataDetailPage'])->name('adminOrderWisataDetail');
    Route::put('/api/order/wisata/confirm/{order}', [\App\Http\Controllers\AdminOrderController::class, 'orderWisataConfirmMethod'])->name('adminOrderWisataConfirmMethod');

    Route::get('/admin/order/explore', [\App\Http\Controllers\AdminOrderController::class, 'orderExploreListPage'])->name('adminOrderExplore');
    Route::get('/admin/order/explore/detail/{order}', [\App\Http\Controllers\AdminOrderController::class, 'orderExploreDetailPage'])->name('adminOrderExploreDetail');
    Route::put('/api/order/explore/confirm/{order}', [\App\Http\Controllers\AdminOrderController::class, 'orderExploreConfirmMethod'])->name('adminOrderExploreConfirmMethod');

    Route::get('/admin/waste', [\App\Http\Controllers\AdminWasteController::class, 'wasteListPage'])->name('adminWaste');
    Route::get('/admin/waste/detail/{waste}', [\App\Http\Controllers\AdminWasteController::class, 'wasteDetailPage'])->name('adminWasteDetail');
    Route::put('/api/waste/confirm/{waste}', [\App\Http\Controllers\AdminWasteController::class, 'wasteConfirmMethod'])->name('adminWasteConfirmMethod');
});