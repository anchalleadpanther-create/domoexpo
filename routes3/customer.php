<?php
use App\Actions\StaticPage;
use App\Http\Controllers\Customer\Blog\BlogController;
use App\Http\Controllers\Customer\CustomHomePagesController;
Route::name('customer.')->group(function () { 

Route::get('/pages/{pageName}', StaticPage::class)->name('static-page');
Route::get('/faq', [CustomHomePagesController::class, 'faq'])->name('faq');
Route::get('/blogs', [BlogController::class, 'blogListing'])->name('blogs');
Route::get('/blog/{blogName}/{blogId}', [BlogController::class, 'blogDetail'])->name('blog-detail');
});