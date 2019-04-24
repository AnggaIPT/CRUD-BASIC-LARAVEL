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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::middleware('auth')->group(function(){
    Route::get('/category','CategoryController@index')->name('category.index');
    Route::get('/category/create','CategoryController@create')->name('category.create');
    Route::post('/category/create','CategoryController@store')->name('category.store');
    Route::get('/category/{category}/edit','CategoryController@edit')->name('category.edit');
    Route::patch('category/{category}/edit','CategoryController@update')->name('category.update');
    Route::delete('category/{category}/delete','CategoryController@destroy')->name('category.destroy');


    //route untuk menampilkan post
    Route::get('/post','PostController@index')->name('post.index');

    //route untuk membuat post
    Route::get('/post/create','PostController@create')->name('post.create');

    //route untuk mengirim hasil dari create post
    Route::post('/post/create','PostController@store')->name('post.store');

    //route untuk mengedit post
    Route::get('/post/{post}/edit','PostController@edit')->name('post.edit');
    //route untuk mengirim hasil update
    Route::patch('post/{post}/edit','PostController@update')->name('post.update');

    Route::delete('post/{post}/delete','PostController@destroy')->name('post.destroy');

    //route untuk menbuat detail post
    Route::get('/post/{post}','PostController@show')->name('post.show');

    Route::post('/post/{post}/comment','PostCommentController@store')->name('post.comment.store');
});

