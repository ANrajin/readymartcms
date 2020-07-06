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

Route::get('/', 'DefaultController@index');
Route::get('/view/{slug}', 'DefaultController@showPost')->name('view.post');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin'], function () {
    Route::middleware('auth:admin')->group(function () {
        //Admin home route
        Route::get('/home', 'Admin\AdminController@index')->name('admin.home');

        //post tag route
        Route::resource('/tags', 'Admin\tagController');
        Route::get('/tags/destory/{id}', 'Admin\tagController@destroy')->name('tag.remove');

        //post category routes
        Route::resource('/categories', 'Admin\categoryController');
        Route::get('/categories/destory/{id}', 'Admin\categoryController@destroy')->name('categories.remove');

        //post category routes
        Route::resource('/posts', 'Admin\PostController');
        Route::get('/all-posts', 'Admin\PostController@show')->name('all.posts');
    });
});
