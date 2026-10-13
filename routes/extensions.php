<?php

use App\Actions\Admin\ChangePassword;
use Illuminate\Support\Facades\Route;
use App\Actions\Admin\NewsletterUsers;
use App\Http\Controllers\Cms\SliderController;
use App\Http\Controllers\Cms\ShopByAgesController;
use App\Http\Controllers\Cms\BannersController;
use App\Http\Controllers\Cms\TestimonialsController;
use App\Http\Controllers\Extensions\FAQController;
use App\Http\Controllers\Extensions\BlogController;
use App\Http\Controllers\Extensions\MenuController;
use App\Http\Controllers\Extensions\PageController;
use App\Http\Controllers\Extensions\MediaController;
use App\Http\Controllers\Extensions\UsersController;
use App\Http\Controllers\Extensions\CompanyController;
use App\Http\Controllers\Extensions\CurrencyController;
use App\Http\Controllers\Extensions\NavbarMenuController;
use App\Http\Controllers\Extensions\PermissionsController;
use App\Http\Controllers\Extensions\BlogCategoryController;
use App\Http\Controllers\Extensions\FooterCategoryController;
use App\Http\Controllers\Extensions\FooterSubCategoryController;
use App\Http\Controllers\Extensions\SelectBoxAttributeController;
use App\Http\Controllers\Extensions\SelectBoxAttributeValueController;
use App\Http\Controllers\Extensions\PlatformFeeController;

Route::middleware(['web', 'auth', 'CheckStatusAndLogout'])->prefix('admin')->name('admin.')->group(function () {
  Route::get('media/status/{id}/{status}', [MediaController::class, 'toggleStatus'])->name('media.status');
  Route::get('page/status/{id}/{status}', [PageController::class, 'toggleStatus'])->name('page.status');
  Route::get('blog/status/{id}/{status}', [BlogController::class, 'toggleStatus'])->name('blog.status');
  Route::get('company/status/{id}/{status}', [CompanyController::class, 'toggleStatus'])->name('company.status');
  Route::get('faq/status/{id}/{status}', [FAQController::class, 'toggleStatus'])->name('faq.status');
  Route::get('footer-category/status/{id}/{status}', [FooterCategoryController::class, 'toggleStatus'])->name('footer-category.status');
  Route::get('footer-sub-category/status/{id}/{status}', [FooterSubCategoryController::class, 'toggleStatus'])->name('footer-sub-category.status');
  Route::get('blog-category/status/{id}/{status}', [BlogCategoryController::class, 'toggleStatus'])->name('blog-category.status');
  Route::post('/home-slider/sort-update/', [SliderController::class, 'sortUpdate'])->name('home-slider-sort-update');
  Route::get('currencies/status/{id}/{status}', [CurrencyController::class, 'toggleStatus'])->name('currencies.status');
  Route::get('/sliders/type/{position?}', [SliderController::class, 'index'])->name('sliders.index');
  Route::match(['get', 'post'], '/shop-by-ages/{age_id?}', [ShopByAgesController::class, 'index'])->name('shop-by-ages');
  Route::post('/save-shop-by-ages/{id?}', [ShopByAgesController::class, 'store'])->name('save-shop-by-ages');
  Route::delete('/delete-shop-by-ages/{age_id?}', [ShopByAgesController::class, 'destroy'])->name('delete-shop-by-ages');

  Route::get('/newsletter', NewsletterUsers::class)->name('newsletter-users');

  Route::resource('sliders', SliderController::class)->except(['index']);

  Route::view('/change-password', 'extensions.users.change-password')->name('change-password');
  Route::post('/change-password', ChangePassword::class)->name('change-password');
  Route::get('users/status/{id}/{status}', [UsersController::class, 'toggleStatus'])->name('users.status');
  Route::post('/home-testimonial/sort-update/', [TestimonialsController::class, 'sortUpdate'])->name('home-testimonial-sort-update');
  
  
  Route::get('platform-fees', [PlatformFeeController::class, 'platformFee'])->name('platform-fees');
    Route::post('update-platform-fees', [PlatformFeeController::class, 'updatePlatformFee'])->name('update-platform-fees');
  
  Route::resources([
    'menu' => MenuController::class,
    'navbar-menu' => NavbarMenuController::class,
    'page' => PageController::class,
    'media' => MediaController::class,
    'blog' => BlogController::class,
    'blog-category' => BlogCategoryController::class,
    'company' => CompanyController::class,
    'dropdown' => SelectBoxAttributeController::class,
    'dropdown-value' => SelectBoxAttributeValueController::class,
    'faq' => FAQController::class,
    'footer-category' => FooterCategoryController::class,
    'footer-sub-category' => FooterSubCategoryController::class,
    'banners' => BannersController::class,
    'currencies' => CurrencyController::class,
    'permissions' => PermissionsController::class,
    'users' => UsersController::class,
    'testimonials' => TestimonialsController::class,
  ]);
});
