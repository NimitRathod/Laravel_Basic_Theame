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

/* Route::get('/', function () {
    return view('welcome');
}); */

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// Backend Default Page
Route::group(['prefix'=>'/bck','middleware' => ['auth']], function () {

    Route::get('/default', function () {
        return view('backend.default');
    });


    //Profile
    Route::get('/profile', function () {
        return view('backend.templates.profile.show');
    });

    // DAshboard Page
    Route::get('/', function () {
        //return view('backend.layout.app');
        return view('backend.templates.empty_page');
        // return view('backend.default');
    });

    Route::resource('roles', 'spatie\RoleController');
    Route::resource('users', 'spatie\UserController');
    Route::resource('permissions', 'spatie\PermissionController');

    Route::get('products', ['uses'=>'ProductController@index']);
    Route::get('products/getProducts', ['as'=>'products.getProducts','uses'=>'ProductController@getProducts']);
});
