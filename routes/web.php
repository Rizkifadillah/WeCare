<?php

use App\Http\Controllers\{
    CategoryController,
    DashboardController,
    CampaignController,
    CashoutController,
    ContactController,
    DonationController,
    DonaturController,
    ReportController,
    SettingController,
    SubscriberController,
    UserProfileInformation,
};

use App\Http\Controllers\Front\{
    AboutController,
    CampaignController as FrontCampaignController,
    ContactController as FrontContactController,
    DonationController as FrontDonationController,
    PaymentController,
    FrontController,
    SubscriberController as FrontSubscriberController,
};
use App\Models\Subscriber;
use Illuminate\Support\Facades\Route;


Route::get('/', [FrontController::class, 'index']);

Route::get('/contact', [FrontContactController::class, 'index']);
Route::post('/contact', [FrontContactController::class, 'store']);

Route::get('/about', [AboutController::class, 'index']);

Route::resource('/campaign', FrontCampaignController::class)->only('index', 'create', 'edit');

Route::get('/donation', [FrontDonationController::class, 'index']);
Route::get('/donation/{id}', [FrontDonationController::class, 'show']);

Route::group(
    [
        'middleware' => ['auth', 'role:admin,donatur']
    ],
    function () {
        Route::get('/donation/{id}/create', [FrontDonationController::class, 'create']);
        Route::post('/donation/{id}/create', [FrontDonationController::class, 'store']);
        Route::get('/donation/{id}/payment/{order_number}', [PaymentController::class, 'index']);
        Route::get('/donation/{id}/payment-confirmation/{order_number}', [PaymentController::class, 'payment_confirmation']);
        Route::post('/donation/{id}/payment-confirmation/{order_number}', [PaymentController::class, 'store']);
    }
);

Route::post('/subscriber', [FrontSubscriberController::class, 'store']);


Route::group([
    'middleware' => ['auth', 'role:admin,donatur'],
    'prefix' => 'admin'
], function () {
    Route::get('/', function () {
        return redirect()->route('dashboard.index');
    });
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::get('/user/profile', [UserProfileInformation::class, 'show'])->name('profile.show');
    Route::delete('/user/bank/{id}', [UserProfileInformation::class, 'bankDestroy'])->name('profile.bank.delete');


    Route::group([
        'middleware' => 'role:admin'
    ], function () {
        Route::resource('/category', CategoryController::class);

        Route::get('/setting', [SettingController::class, 'index'])->name('setting.index');
        Route::put('/setting/{setting}', [SettingController::class, 'update'])->name('setting.update');
        Route::delete('/setting/{setting}/bank/{id}', [SettingController::class, 'bankDestroy'])->name('setting.bank.delete');
    });
    Route::get('/campaign/data', [CampaignController::class, 'data'])->name('campaign.data');
    Route::resource('/campaign', CampaignController::class);
    Route::put('/campaign/{id}/update_status', [CampaignController::class, 'update_status'])->name('campaign.update_status');
    Route::get('/campaign/{id}/cashout', [CampaignController::class, 'cashout'])->name('campaign.cashout');
    Route::post('/campaign/{id}/cashout', [CampaignController::class, 'cashout_store'])->name('campaign.cashout.store');

    Route::get('/donation/data', [DonationController::class, 'data'])->name('donation.data');
    Route::resource('/donation', DonationController::class);

    Route::get('/cashout/data', [CashoutController::class, 'data'])->name('cashout.data');
    Route::resource('/cashout', CashoutController::class);

    Route::group([
        'middleware' => 'role:admin'
    ], function () {
        Route::get('/donatur/data', [DonaturController::class, 'data'])->name('donatur.data');
        Route::resource('/donatur', DonaturController::class);

        Route::get('/contact/data', [ContactController::class, 'data'])->name('contact.data');
        Route::resource('/contact', ContactController::class)->only('index', 'destroy');

        Route::get('/subscriber/data', [SubscriberController::class, 'data'])->name('subscriber.data');
        Route::resource('/subscriber', SubscriberController::class)->only('index', 'destroy');

        Route::get('/report', [ReportController::class, 'index'])->name('report.index');
        Route::get('/report/data/{start}/{end}', [ReportController::class, 'data'])->name('report.data');
        Route::get('/report/export_pdf/{start}/{end}', [ReportController::class, 'export_pdf'])->name('report.export_pdf');
        Route::get('/report/export_excel/{start}/{end}', [ReportController::class, 'export_excel'])->name('report.export_excel');
    });
});

// Route::get('/campaign-user', function () {
//     return view('front.campaign.index');
// });
