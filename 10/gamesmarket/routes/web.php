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

Route::get('/', 'FrontController@index');
Route::post('/', 'UserController@index');
Route::get('/good/{id}', 'FrontController@good');
Route::get('/about', 'FrontController@about');
Route::get('/news', 'FrontController@news');
Route::get('/article/{id}', 'FrontController@article');
Route::get('/category/{id}', 'FrontController@category');
Route::get('/search', 'FrontController@search');

Route::group(['middleware' => ['admin']], function () {
    Route::get('/admin', function () {
        return view('admin.index');
    });
    Route::get('/admin/articles','ArticleController@index');
    Route::get('/admin/articles/create','ArticleController@create');
    Route::post('/admin/articles/store','ArticleController@store');
    Route::get('/admin/articles/edit/{id}','ArticleController@edit');
    Route::get('/admin/articles/show/{id}','ArticleController@show');
    Route::delete('/admin/articles/destroy/{id}','ArticleController@destroy');
    Route::post('/admin/articles/update/{id}','ArticleController@update');

    Route::get('/admin/categories','CategoryController@index');
    Route::get('/admin/categories/create','CategoryController@create');
    Route::post('/admin/categories/store','CategoryController@store');
    Route::get('/admin/categories/edit/{id}','CategoryController@edit');
    Route::get('/admin/categories/show/{id}','CategoryController@show');
    Route::delete('/admin/categories/destroy/{id}','CategoryController@destroy');
    Route::post('/admin/categories/update/{id}','CategoryController@update');

    Route::get('/admin/goods','GoodController@index');
    Route::get('/admin/goods/create','GoodController@create');
    Route::post('/admin/goods/store','GoodController@store');
    Route::get('/admin/goods/edit/{id}','GoodController@edit');
    Route::get('/admin/goods/show/{id}','GoodController@show');
    Route::delete('/admin/goods/destroy/{id}','GoodController@destroy');
    Route::post('/admin/goods/update/{id}','GoodController@update');

    Route::get('/admin/orders','OrderController@index');

});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/myorders', 'FrontController@orders');
    Route::get('/orders/store', 'OrderController@store');
});


