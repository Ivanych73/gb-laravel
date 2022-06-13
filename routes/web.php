<?php

use App\Http\Controllers\Controller as BaseController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\IndexController as AdminController;
use App\Http\Controllers\Admin\AuthorController as AdminAuthorController;
use App\Http\Controllers\Admin\FeedbackController as AdminFeedbackController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\SourceController as AdminSourceController;
use App\Http\Controllers\Admin\ParserController as AdminParserController;
use App\Http\Controllers\UserFormController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\SocialController;

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

Route::get(
    '/',
    [NewsController::class, 'index']
)->name('news.main');

Route::get(
    '/about',
    [BaseController::class, 'about']
)->name('about');

Route::get(
    '/contacts',
    [BaseController::class, 'contacts']
)->name('contacts');

Route::get(
    '/news/{id}',
    [NewsController::class, 'showNewsDetailById']
)->where(
    'id',
    '\d+'
)->name('news.detail');

Route::get(
    '/categories/{id}',
    [NewsController::class, 'listNewsByCategory']
)->where(
    'id',
    '\d+'
)->name('news.list');

Route::get(
    '/categories',
    [NewsController::class, 'listCategories']
)->name('categories.list');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [UserProfileController::class, 'show'])->name('user.profile');

    Route::group(['middleware' => 'admin', 'prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::get('/', AdminController::class)->name('index');
        Route::resource('/categories', AdminCategoryController::class);
        Route::resource('/news', AdminNewsController::class);
        Route::resource('/authors', AdminAuthorController::class);
        Route::resource('/feedbacks', AdminFeedbackController::class);
        Route::resource('/orders', AdminOrderController::class);
        Route::resource('/users', AdminUserController::class);
        Route::resource('/sources', AdminSourceController::class);
        Route::controller(AdminParserController::class)->group(function () {
            Route::get('/parser/sources', 'showSources')->name('parser.sources');
            Route::match(['post', 'get'], '/parser/news', 'parseNews')->name('parser.news');
        });
    });
});

Route::controller(UserFormController::class)->group(function () {
    Route::get('/feedback', 'feedback')->name('user.feedback');
    Route::get('/order', 'order')->name('user.order');
    Route::match(['post', 'get'], '/saveFeedback', 'saveFeedback')->name('user.saveFeedback');
    Route::match(['post', 'get'], '/saveOrder', 'saveOrder')->name('user.saveOrder');
});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth', 'admin']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/auth/{driver}/redirect', [SocialController::class, 'redirect'])
        ->where('driver', '\w+')
        ->name('social.redirect');
    Route::any('/auth/{driver}/callback', [SocialController::class, 'callback'])
        ->where('driver', '\w+')
        ->name('social.callback');
});
