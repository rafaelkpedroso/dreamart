<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\WebsiteController;

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

Auth::routes();

Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');
Auth::routes();

Route::get('/admin', 'App\Http\Controllers\AdminController@index')->name('admin')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
		Route::get('icons', ['as' => 'pages.icons', 'uses' => 'App\Http\Controllers\PageController@icons']);
		Route::get('maps', ['as' => 'pages.maps', 'uses' => 'App\Http\Controllers\PageController@maps']);
		Route::get('notifications', ['as' => 'pages.notifications', 'uses' => 'App\Http\Controllers\PageController@notifications']);
		Route::get('rtl', ['as' => 'pages.rtl', 'uses' => 'App\Http\Controllers\PageController@rtl']);
		Route::get('tables', ['as' => 'pages.tables', 'uses' => 'App\Http\Controllers\PageController@tables']);
		Route::get('typography', ['as' => 'pages.typography', 'uses' => 'App\Http\Controllers\PageController@typography']);
		Route::get('upgrade', ['as' => 'pages.upgrade', 'uses' => 'App\Http\Controllers\PageController@upgrade']);
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});





// Conteúdos
Route::get('/', [WebsiteController::class, 'home']);
Route::get('/quemsomos', [WebsiteController::class, 'quemsomos']);
Route::get('/faq', [WebsiteController::class, 'faq']);
Route::get('/legal', [WebsiteController::class, 'legal']);
Route::get('/politicadeprivacidade', [WebsiteController::class, 'politicadeprivacidade']);
Route::get('/cookies', [WebsiteController::class, 'cookies']);
Route::get('/planos', [WebsiteController::class, 'planos']);
Route::get('/videos', [WebsiteController::class, 'videos']);
Route::get('/lives', [WebsiteController::class, 'lives']);
Route::get('/podcasts', [WebsiteController::class, 'podcasts']);
Route::get('/favoritos', [WebsiteController::class, 'favoritos']);
Route::get('/video/{videoid}', [WebsiteController::class, 'video']);
Route::get('/busca/', [WebsiteController::class, 'busca']);


Route::group(['middleware' => 'auth'], function () {
    Route::get('admin/taxonomy', ['as' => 'admin.taxonomy', 'uses' => 'App\Http\Controllers\TaxonomyController@index']);
    Route::get('admin/taxonomy/edit/{id}', ['as' => 'admin.taxonomy', 'uses' => 'App\Http\Controllers\TaxonomyController@edit']);
});
Route::get('video/play/{slug}', [VideoController::class, 'play']);
