<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserActiveController;
use App\Http\Controllers\UserBankController;
use App\Http\Controllers\UserWishController;
use App\Http\Controllers\WishesController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CampaignBannerController;
use App\Http\Controllers\CampaignPeriodController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\WithdrawController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\CampaignReportController;
use App\Http\Controllers\CampaignReportDetailController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
});


/*
|--------------------------------------------------------------------------
| API Each Table Routes
| http://127.0.0.1:8000/api/user-banks                  |GET|POST|PUT|DELETE|
| http://127.0.0.1:8000/api/user-actives                |GET|POST|PUT|DELETE|
| http://127.0.0.1:8000/api/wishes                      |GET|POST|PUT|DELETE|
| http://127.0.0.1:8000/api/user-wishes                 |GET|POST|PUT|DELETE|
| http://127.0.0.1:8000/api/news                        |GET|POST|PUT|DELETE|
| http://127.0.0.1:8000/api/campaign-banners            |GET|POST|PUT|DELETE|
| http://127.0.0.1:8000/api/campaign-periods            |GET|POST|PUT|DELETE|
| http://127.0.0.1:8000/api/campaigns                   |GET|POST|PUT|DELETE|
| http://127.0.0.1:8000/api/payments                    |GET|POST|PUT|DELETE|
| http://127.0.0.1:8000/api/campaign-reports            |GET|POST|PUT|DELETE|
| http://127.0.0.1:8000/api/campaign-report-details     |GET|POST|PUT|DELETE|
| http://127.0.0.1:8000/api/withdraws                   |GET|POST|PUT|DELETE|
| http://127.0.0.1:8000/api/transactions                |GET|POST|PUT|DELETE|
|--------------------------------------------------------------------------
*/
// user_banks
Route::controller(UserBankController::class)->group(function () {
    Route::get('user-banks', 'index');
    Route::post('user-banks', 'store');
    Route::get('user-banks/{id}', 'show');
    Route::put('user-banks/{id}', 'update');
    Route::delete('user-banks/{id}', 'destroy');
});

// user_actives
Route::controller(UserActiveController::class)->group(function () {
    Route::get('user-actives', 'index');
    Route::post('user-actives', 'store');
    Route::get('user-actives/{id}', 'show');
    Route::put('user-actives/{id}', 'update');
    Route::delete('user-actives/{id}', 'destroy');
});

// wishes
Route::controller(WishesController::class)->group(function () {
    Route::get('wishes', 'index');
    Route::post('wishes', 'store');
    Route::get('wishes/{id}', 'show');
    Route::put('wishes/{id}', 'update');
    Route::delete('wishes/{id}', 'destroy');
});

// user_wishes
Route::controller(UserWishController::class)->group(function () {
    Route::get('user-wishes', 'index');
    Route::post('user-wishes', 'store');
    Route::get('user-wishes/{id}', 'show');
    Route::put('user-wishes/{id}', 'update');
    Route::delete('user-wishes/{id}', 'destroy');
});

// news
Route::controller(NewsController::class)->group(function () {
    Route::get('news', 'index');
    Route::post('news', 'store');
    Route::get('news/{id}', 'show');
    Route::put('news/{id}', 'update');
    Route::delete('news/{id}', 'destroy');
});

// campaign_banners
Route::controller(CampaignBannerController::class)->group(function () {
    Route::get('campaign-banners', 'index');
    Route::post('campaign-banners', 'store');
    Route::get('campaign-banners/{id}', 'show');
    Route::put('campaign-banners/{id}', 'update');
    Route::delete('campaign-banners/{id}', 'destroy');
});

// campaign_periods
Route::controller(CampaignPeriodController::class)->group(function () {
    Route::get('campaign-periods', 'index');
    Route::post('campaign-periods', 'store');
    Route::get('campaign-periods/{id}', 'show');
    Route::put('campaign-periods/{id}', 'update');
    Route::delete('campaign-periods/{id}', 'destroy');
});

// campaigns
Route::controller(CampaignController::class)->group(function () {
    Route::get('campaigns', 'index');
    Route::post('campaigns', 'store');
    Route::get('campaigns/{id}', 'show');
    Route::put('campaigns/{id}', 'update');
    Route::delete('campaigns/{id}', 'destroy');
});

// payments
Route::controller(PaymentController::class)->group(function () {
    Route::get('payments', 'index');
    Route::post('payments', 'store');
    Route::get('payments/{id}', 'show');
    Route::put('payments/{id}', 'update');
    Route::delete('payments/{id}', 'destroy');
});

// campaign_reports
Route::controller(CampaignReportController::class)->group(function () {
    Route::get('campaign-reports', 'index');
    Route::post('campaign-reports', 'store');
    Route::get('campaign-reports/{id}', 'show');
    Route::put('campaign-reports/{id}', 'update');
    Route::delete('campaign-reports/{id}', 'destroy');
});

// campaign_report_details
Route::controller(CampaignReportDetailController::class)->group(function () {
    Route::get('campaign-report-details', 'index');
    Route::post('campaign-report-details', 'store');
    Route::get('campaign-report-details/{id}', 'show');
    Route::put('campaign-report-details/{id}', 'update');
    Route::delete('campaign-report-details/{id}', 'destroy');
});

// withdraws
Route::controller(WithdrawController::class)->group(function () {
    Route::get('withdraws', 'index');
    Route::post('withdraws', 'store');
    Route::get('withdraws/{id}', 'show');
    Route::put('withdraws/{id}', 'update');
    Route::delete('withdraws/{id}', 'destroy');
});

// transactions
Route::controller(TransactionController::class)->group(function () {
    Route::get('transactions', 'index');
    Route::post('transactions', 'store');
    Route::get('transactions/{id}', 'show');
    Route::put('transactions/{id}', 'update');
    Route::delete('transactions/{id}', 'destroy');
});


