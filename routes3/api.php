<?php

use App\Actions\ApplyPatch;
use Illuminate\Http\Request;
use App\Actions\CompressImages;
use App\Actions\GTM\GetProduct;
use Illuminate\Support\Facades\Route;
use App\Actions\Cron\UpdateCustomerTier;
use App\Actions\Admin\Buyers\ExportBuyers;
use App\Actions\Customer\OrderWhatsappNotification;
use App\Http\Controllers\Api\Customer\Buyer\BuyerAuthController;

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

Route::post('/buyer/register', [BuyerAuthController::class, 'register']);
Route::post('/buyer/login', [BuyerAuthController::class, 'login']);

Route::get('/compress-images/{path}/{limit?}', CompressImages::class);
Route::get('/divide-and-allocate-amounts', ApplyPatch::class);
// Route::get('/apply-patch', ApplyPatch::class);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
  return $request->user();
});

Route::prefix('gtm')->name('gtm.')->group(function () {
  Route::get('/get-product/{productId}', GetProduct::class)->name('get-product');
});

require __DIR__ . '/global-api.php';
require __DIR__ . '/product-api.php';
require __DIR__ . '/customer-api.php';
