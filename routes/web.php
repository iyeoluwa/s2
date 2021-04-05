<?php

use Illuminate\Support\Facades\Route;

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


/**
 * This is the admin domain
*/


Route::domain('admin.'.env('APP_URL'))->group(function(){

Route::get('/',[\App\Http\Controllers\Auth\AuthenticatedSessionController::class,'create'])->middleware('guest');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
//this are routes for the articles

Route::get('/articles',[\App\Http\Controllers\ArticleController::class,'index'])->name('admin.article.home');
Route::get('/articles/new',[\App\Http\Controllers\ArticleController::class,'showNewForm'])->name('admin.article.new');
Route::post('/articles/new',[\App\Http\Controllers\ArticleController::class,'create']);
Route::get('/articles/edit/{id}',[\App\Http\Controllers\ArticleController::class,'edit'])->name('admin.article.edit');
Route::post('/articles/edit/{id}',[\App\Http\Controllers\ArticleController::class,'update']);
Route::delete('/articles/delete/{article}',[\App\Http\Controllers\ArticleController::class,'destroy'])->name('admin.article.destroy');

#this routes are for the podcasts
Route::get('/podcasts',[\App\Http\Controllers\SeriesController::class,'index'])->name('admin.podcast.home');
Route::get('/podcasts/series/new',[\App\Http\Controllers\SeriesController::class,'show'])->name('admin.podcast.series.new');
Route::get('/podcasts/series/{id}/{title}/',[\App\Http\Controllers\SeriesController::class,'fullSeries'])->name('admin.podcasts.series.podcasts.full');


});




/**
*
 * This is the blog domain
 */


Route::domain('blog.'.env('APP_URL'))->group(function(){

# this route will return the view of the home blog
Route::get('/',[\App\Http\Controllers\ArticleController::class,'indexHome']);
Route::get('/dashboard',[\App\Http\Controllers\ArticleController::class,'indexHome'])->name('blog.home');
Route::get('/article/{id}',[\App\Http\Controllers\ArticleController::class,'show'])->name('blog.article');

//tag routes
Route::get('/topics/{tag}',[\App\Http\Controllers\ArticleController::class,'getTagPost'])->name('blog.tags.specific');
Route::get('/topics/',[\App\Http\Controllers\ArticleController::class,'getAllTags'])->name('tag.tags');

});


/**
*
*This is the podcast domain
**/


Route::domain('podcast.' .env('APP_URL'))->group(function(){

# this is the route for the podcasts page
Route::get('/',[\App\Http\Controllers\SeriesController::class,'publicShow']);
Route::get('/dashboard',[\App\Http\Controllers\SeriesController::class,'publicShow'])->name('podcast.home');
Route::get('/series/get/{id}/{title}',[\App\Http\Controllers\PodcastController::class,'index'])->name('podcast.series');
Route ::get('/series/load/{id}',[\App\Http\Controllers\PodcastController::class,'episodeOnLoad'])->name('podcast.episode.onload');
});








//Route::get('/', function () {
//    return view('welcome');
//});
require __DIR__.'/auth.php';
