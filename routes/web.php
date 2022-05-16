<?php

use App\Http\Controllers\Controller as BaseController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\IndexController as AdminController;

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

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/', AdminController::class)->name('index');
    Route::resource('/categories', AdminCategoryController::class);
    Route::resource('/news', AdminNewsController::class);
});

Route::get('/about', function () {
    return 'About page';
});

Route::get('/news/{id}', function (string $id) {
    return "Новость номер $id";
});