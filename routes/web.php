<?php

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

Route::get('/', function () {
    return view('welcome');
});



/*Route::get('/home', 'HomeController@index')->name('home');*/
Route::post('/sendmail','MailController@send');
Route::get('/download_post_file/{id}','PostfiledownloadController@download');
Route::get('/portfolio/random','PortfolioController@random');
Route::get('/portfolio/{id}','PortfolioController@events');
Route::get('/gallery/random','GalleryController@random');
Route::get('/gallery/{id}','GalleryController@events');
Route::get('/event/past','VueventController@past');
Route::get('/event/today','VueventController@today');
Route::get('/event/upcoming','VueventController@upcoming');
Route::get('/videos/search','API\VideoController@search');
Route::get('/about/vue','API\AboutController@vue');
Route::get('/comment/vue','API\CommentController@vue');
Route::get('/post/vue','API\PostController@vue');
Route::get('/slider/vue','API\SliderController@vue');
Route::get('/socialite/vue','API\SocialiteController@vue');
Route::get('/imageCategory/vue','API\ImageCategoryController@vue');
