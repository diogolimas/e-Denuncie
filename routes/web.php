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



Auth::routes();

Route::group(['middleware' => ['auth']],function(){
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/posts', 'HomeController@myPosts')->name('myPosts');

    Route::post('/postar','PostController@create')->name('postar.denuncia');

    Route::post('/comentar','CommentController@create')->name('comentar.denuncia');

    //Route::get('comment/create/','')->name();

    Route::get('/post/{id}/comments', 'PostController@show')->name('post.comment');


    //
    Route::post('/api/getups','PostController@upCount')->name('api.getups');
    Route::post('/api/setups','PostController@upPost')->name('api.setups');
    Route::post('/api/getlikes','CommentController@likeCount')->name('api.getlikes');
    Route::post('/api/setlikes','CommentController@likeComment')->name('api.setlikes');

    Route::get('/categoria/{id}','CategoriaController@index')->name('categorias');
});


