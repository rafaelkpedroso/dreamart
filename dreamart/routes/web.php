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

// idiomaa
Route::get('/lang/{idioma}', [WebsiteController::class, 'setLang']);



// Conteúdos
Route::get('/', [WebsiteController::class, 'home']);
Route::get('/home', [WebsiteController::class, 'home']);
Route::get('/quemsomos', [WebsiteController::class, 'quemsomos']);
Route::get('/faq', [WebsiteController::class, 'faq']);
Route::get('/legal', [WebsiteController::class, 'legal']);
Route::get('/politicadeprivacidade', [WebsiteController::class, 'politicadeprivacidade']);
Route::get('/cookies', [WebsiteController::class, 'cookies']);

Route::get('/planos', [WebsiteController::class, 'planos']);
Route::post('/cadastrar', ['as' => 'cadastrar', 'uses' => 'App\Http\Controllers\UserController@cadastrar']);

Route::get('/videos', [WebsiteController::class, 'videos']);
Route::get('/video/{videoid}', [WebsiteController::class, 'video']);
Route::get('/lives', [WebsiteController::class, 'lives']);
Route::get('/lives/{videoid}', [WebsiteController::class, 'live']);
Route::get('/podcasts', [WebsiteController::class, 'podcasts']);
Route::get('/podcasts/{videoid}', [WebsiteController::class, 'podcast']);
Route::get('/favoritos', [WebsiteController::class, 'favoritos']);
Route::get('/busca/', [WebsiteController::class, 'busca']);

Route::post('/comments/store', ['as' => 'comments.store', 'uses' => 'App\Http\Controllers\CommentController@store']);
Route::post('/comments/update/{id}', ['as' => 'comments.update', 'uses' => 'App\Http\Controllers\CommentController@update']);
Route::get('/comments/delete/{id}', ['as' => 'comments.delete', 'uses' => 'App\Http\Controllers\CommentController@destroy']);
Route::get('/comments/like/{id}', ['as' => 'comments.like', 'uses' => 'App\Http\Controllers\CommentController@like']);
Route::get('/comments/dislike/{id}', ['as' => 'comments.dislike', 'uses' => 'App\Http\Controllers\CommentController@dislike']);



Route::group(['middleware' => 'auth'], function () {

    Route::get('/admin/users', ['as' => 'users.index', 'uses' => 'App\Http\Controllers\UserController@index']);
    Route::get('/admin/users/add', ['as' => 'users.create', 'uses' => 'App\Http\Controllers\UserController@create']);
    Route::put('/admin/users/store', ['as' => 'users.store', 'uses' => 'App\Http\Controllers\UserController@store']);
    Route::get('/admin/users/delete/{id}', ['as' => 'users.delete', 'uses' => 'App\Http\Controllers\UserController@destroy']);
    Route::get('/admin/users/edit/{id}', ['as' => 'users.edit', 'uses' => 'App\Http\Controllers\UserController@edit']);
    Route::put('/admin/users/update/{id}', ['as' => 'users.update', 'uses' => 'App\Http\Controllers\UserController@update']);
    Route::get('/admin/users/bills/{id}', ['as' => 'users.bills', 'uses' => 'App\Http\Controllers\UserController@bills']);

    Route::get('/admin/videos', ['as' => 'videos.index', 'uses' => 'App\Http\Controllers\VideoController@index']);
    Route::get('/admin/videos/add', ['as' => 'videos.create', 'uses' => 'App\Http\Controllers\VideoController@create']);
    Route::put('/admin/videos/store', ['as' => 'videos.store', 'uses' => 'App\Http\Controllers\VideoController@store']);
    Route::get('/admin/videos/delete/{id}', ['as' => 'videos.delete', 'uses' => 'App\Http\Controllers\VideoController@destroy']);
    Route::get('/admin/videos/edit/{id}', ['as' => 'videos.edit', 'uses' => 'App\Http\Controllers\VideoController@edit']);
    Route::put('/admin/videos/update/{id}', ['as' => 'videos.update', 'uses' => 'App\Http\Controllers\VideoController@update']);
    Route::get('/video/addview/{id}', ['as' => 'videos.addview', 'uses' => 'App\Http\Controllers\VideoController@addview']);
    Route::get('/video/rate/{id}/{rate}', ['as' => 'videos.rate', 'uses' => 'App\Http\Controllers\VideoController@rate']);

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

    Route::get('admin/bills', ['as' => 'bills.index', 'uses' => 'App\Http\Controllers\BillsController@index']);

    Route::get('/admin/testimonials', ['as' => 'testimonials.index', 'uses' => 'App\Http\Controllers\TestimonialController@index']);
    Route::get('/admin/testimonials/add', ['as' => 'testimonials.create', 'uses' => 'App\Http\Controllers\TestimonialController@create']);
    Route::put('/admin/testimonials/store', ['as' => 'testimonials.store', 'uses' => 'App\Http\Controllers\TestimonialController@store']);
    Route::get('/admin/testimonials/delete/{id}', ['as' => 'testimonials.delete', 'uses' => 'App\Http\Controllers\TestimonialController@destroy']);
    Route::get('/admin/testimonials/edit/{id}', ['as' => 'testimonials.edit', 'uses' => 'App\Http\Controllers\TestimonialController@edit']);
    Route::put('/admin/testimonials/update/{id}', ['as' => 'testimonials.update', 'uses' => 'App\Http\Controllers\TestimonialController@update']);

    Route::get('/admin/setups', ['as' => 'setup.index', 'uses' => 'App\Http\Controllers\SetupController@index']);
    Route::get('/admin/setups/add', ['as' => 'setup.create', 'uses' => 'App\Http\Controllers\SetupController@create']);
    Route::put('/admin/setups/store', ['as' => 'setup.store', 'uses' => 'App\Http\Controllers\SetupController@store']);
    Route::get('/admin/setups/delete/{id}', ['as' => 'setup.delete', 'uses' => 'App\Http\Controllers\SetupController@destroy']);
    Route::get('/admin/setups/edit/{id}', ['as' => 'setup.edit', 'uses' => 'App\Http\Controllers\SetupController@edit']);
    Route::put('/admin/setups/update/{id}', ['as' => 'setup.update', 'uses' => 'App\Http\Controllers\SetupController@update']);

    Route::get('/admin/cms', ['as' => 'cms.index', 'uses' => 'App\Http\Controllers\CmsController@index']);
    Route::get('/admin/cms/add', ['as' => 'cms.create', 'uses' => 'App\Http\Controllers\CmsController@create']);
    Route::put('/admin/cms/store', ['as' => 'cms.store', 'uses' => 'App\Http\Controllers\CmsController@store']);
    Route::get('/admin/cms/delete/{id}', ['as' => 'cms.delete', 'uses' => 'App\Http\Controllers\CmsController@destroy']);
    Route::get('/admin/cms/edit/{id}', ['as' => 'cms.edit', 'uses' => 'App\Http\Controllers\CmsController@edit']);
    Route::put('/admin/cms/update/{id}', ['as' => 'cms.update', 'uses' => 'App\Http\Controllers\CmsController@update']);


    Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
});
Route::get('video/play/{slug}', [VideoController::class, 'play']);
