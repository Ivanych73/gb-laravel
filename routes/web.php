<?php

use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;

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
/*
Route::get('/', function () {
    return '<h2>Welcome!</h2><h3><a href="/categories">News by categories</a></h3>';
});

Route::get('/about', function () {
    return 'About page';
});

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
    Route::resource('/news', AdminNewsController::class);
});
*/
Route::get('/', function (){
    return 'Добро пожаловать!';
});

Route::get('/about', function () {
    return 'About page';
});

Route::get('/news/{id}', function (string $id) {
    return "Новость номер $id";
});