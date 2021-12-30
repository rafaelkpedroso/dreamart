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

    Route::get('/admin/users', ['as' => 'users.index', 'uses' => 'App\Http\Controllers\UserController@index']);
    Route::get('/admin/users/add', ['as' => 'users.create', 'uses' => 'App\Http\Controllers\UserController@create']);
    Route::post('/admin/users/store', ['as' => 'users.store', 'uses' => 'App\Http\Controllers\UserController@store']);

    Route::get('/admin/videos', ['as' => 'videos.index', 'uses' => 'App\Http\Controllers\VideoController@index']);
    Route::get('/admin/videos/add', ['as' => 'videos.create', 'uses' => 'App\Http\Controllers\VideoController@create']);
    Route::put('/admin/videos/store', ['as' => 'videos.store', 'uses' => 'App\Http\Controllers\VideoController@store']);
    Route::get('/admin/videos/delete/{id}', ['as' => 'videos.delete', 'uses' => 'App\Http\Controllers\VideoController@destroy']);
    Route::get('/admin/videos/edit/{id}', ['as' => 'videos.edit', 'uses' => 'App\Http\Controllers\VideoController@edit']);
    Route::put('/admin/videos/update/{id}', ['as' => 'videos.update', 'uses' => 'App\Http\Controllers\VideoController@update']);

    Route::get('/admin/podcasts', ['as' => 'podcasts.index', 'uses' => 'App\Http\Controllers\PodcastController@index']);
    Route::get('/admin/podcasts/add', ['as' => 'podcasts.create', 'uses' => 'App\Http\Controllers\PodcastController@create']);
    Route::put('/admin/podcasts/store', ['as' => 'podcasts.store', 'uses' => 'App\Http\Controllers\PodcastController@store']);
    Route::get('/admin/podcasts/delete/{id}', ['as' => 'podcasts.delete', 'uses' => 'App\Http\Controllers\PodcastController@destroy']);
    Route::get('/admin/podcasts/edit/{id}', ['as' => 'podcasts.edit', 'uses' => 'App\Http\Controllers\PodcastController@edit']);
    Route::put('/admin/podcasts/update/{id}', ['as' => 'podcasts.update', 'uses' => 'App\Http\Controllers\PodcastController@update']);

    Route::get('/admin/lives', ['as' => 'lives.index', 'uses' => 'App\Http\Controllers\LiveController@index']);
    Route::get('/admin/lives/add', ['as' => 'lives.create', 'uses' => 'App\Http\Controllers\LiveController@create']);
    Route::put('/admin/lives/store', ['as' => 'lives.store', 'uses' => 'App\Http\Controllers\LiveController@store']);
    Route::get('/admin/lives/delete/{id}', ['as' => 'lives.delete', 'uses' => 'App\Http\Controllers\LiveController@destroy']);
    Route::get('/admin/lives/edit/{id}', ['as' => 'lives.edit', 'uses' => 'App\Http\Controllers\LiveController@edit']);
    Route::put('/admin/lives/update/{id}', ['as' => 'lives.update', 'uses' => 'App\Http\Controllers\LiveController@update']);


    Route::get('admin/taxonomy', ['as' => 'admin.taxonomy', 'uses' => 'App\Http\Controllers\TaxonomyController@index']);
    Route::get('/admin/taxonomy/add', ['as' => 'taxonomy.create', 'uses' => 'App\Http\Controllers\TaxonomyController@create']);
    Route::put('/admin/taxonomy/store', ['as' => 'taxonomy.store', 'uses' => 'App\Http\Controllers\TaxonomyController@store']);
    Route::get('/admin/taxonomy/delete/{id}', ['as' => 'taxonomy.delete', 'uses' => 'App\Http\Controllers\TaxonomyController@destroy']);
    Route::get('/admin/taxonomy/edit/{id}', ['as' => 'taxonomy.edit', 'uses' => 'App\Http\Controllers\TaxonomyController@edit']);
    Route::put('/admin/taxonomy/update/{id}', ['as' => 'taxonomy.update', 'uses' => 'App\Http\Controllers\TaxonomyController@update']);
});
Route::get('video/play/{slug}', [VideoController::class, 'play']);
