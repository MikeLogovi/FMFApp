<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::resource('image','API\ImageController');
Route::resource('imageCategory','API\ImageCategoryController');
Route::resource('video','API\VideoController');
Route::resource('videoCategory','API\VideoCategoryController');
Route::resource('event','API\EventController');
Route::resource('contact','API\ContactController');
Route::resource('comment','API\CommentController');
Route::resource('about','API\AboutController');
Route::resource('socialite','API\SocialiteController');
Route::resource('slider','API\SliderController');
Route::resource('footer','API\FooterController');
Route::resource('website','API\WebsiteController');