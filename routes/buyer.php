<?php

use Illuminate\Support\Facades\Route;
use App\Actions\Admin\Buyers\ExportBuyers;
use App\Http\Controllers\Buyer\BuyerController;
use App\Http\Controllers\Buyer\WalletController;
use App\Actions\Admin\Buyers\SendClubExclusiveInvitation;

Route::middleware(['web', 'auth', 'CheckStatusAndLogout'])->prefix('admin/buyer')->name('admin.buyers.')->group(function () {

  Route::get('/status/{id}/{status}', [BuyerController::class, 'toggleStatus'])->name('status');
  Route::get('/quotation-status/{id}/{status}', [BuyerController::class, 'toggleQuotationStatus'])->name('quotation-status');
  Route::get('/{type}/{buyerStatus}', [BuyerController::class, 'index'])->name('index');
  Route::view('/address/create/{buyerId}', 'buyer.create-address')->name('address.create');
  Route::post('/address/store', [BuyerController::class, 'storeAddress'])->name('address.store');
  Route::get('/manage/wallet/{buyerId}', [WalletController::class, 'index'])->name('manage-wallet.index');
  Route::post('/manage/wallet/store/{buyerId}', [WalletController::class, 'store'])->name('manage-wallet.store');
  Route::get('/invitation/send-club-exclusive-invitation/{id}', SendClubExclusiveInvitation::class)->name('send-club-exclusive-invitation');
  Route::get('/export-buyers', ExportBuyers::class)->name('export-buyers');
  Route::post('/buyer/activete-subscription-plan', [BuyerController::class, 'activateFreeSubscriptionPlan'])->name('activete-subscription-plan');
  
});
Route::middleware(['web', 'auth', 'CheckStatusAndLogout'])->prefix('admin')->name('admin.')->group(function () {
  Route::resource('buyers', BuyerController::class)->except('index');
});
