<?php

use App\Http\Controllers\Admin\Content\BlogController;
use App\Http\Controllers\Admin\Content\CommentController;
use App\Http\Controllers\Admin\Content\FaqController;
use App\Http\Controllers\Admin\Content\MenuController;
use App\Http\Controllers\Admin\Content\PageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Market\BrandController;
use App\Http\Controllers\Admin\Market\CopanController;
use App\Http\Controllers\Admin\Market\DeliveryController;
use App\Http\Controllers\Admin\Market\PaymentController;
use App\Http\Controllers\Admin\Market\ProductCategoryController;
use App\Http\Controllers\Admin\Market\ProductController;
use App\Http\Controllers\Admin\Market\ProductImageController;
use App\Http\Controllers\Admin\Setting\SettingController;
use App\Http\Controllers\Admin\Ticket\TicketAdminController;
use App\Http\Controllers\Admin\Ticket\TicketCategoryController;
use App\Http\Controllers\Admin\Ticket\TicketController;
use App\Http\Controllers\Home\Customer\AddressController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

require __DIR__ . '/auth.php';

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', DashboardController::class);
    Route::prefix('setting')->name('setting.')->group(function () {
        Route::resource('setting', SettingController::class);
    });
    Route::prefix('content')->name('content.')->group(function () {
        Route::resource('menu', MenuController::class);
        Route::resource('faq', FaqController::class);
        Route::resource('page', PageController::class);
        Route::resource('comment', CommentController::class);
        Route::resource('blog', BlogController::class);
    });
    Route::prefix('tickets')->name('tickets.')->group(function () {
        Route::resource('ticket-category', TicketCategoryController::class);
        Route::resource('ticket-admin', TicketAdminController::class);
        Route::resource('ticket', TicketController::class);
    });
    Route::prefix('market')->name('market.')->group(function () {
        Route::resource('product-category', ProductCategoryController::class);
        Route::resource('brand', BrandController::class);
        Route::resource('product', ProductController::class);
        Route::resource('product-image/{product}', ProductImageController::class);
        Route::resource('copan', CopanController::class);
        Route::resource('delivery', DeliveryController::class);
        Route::resource('payment', PaymentController::class);
    });
});

Route::prefix('market')->name('market.')->group(function () {
    Route::resource('address', AddressController::class);
});
