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

<<<<<<< Updated upstream
Route::get('/', function () {
    return view('welcome');
});
=======
    Route::get('contact','ClientController@contact');

    Route::get('login','LoginController@ShowLoginForm');

    Route::get('listing',"ClientController@listing");

    Route::group(['prefix' => 'register'], function () {
        route::get('','RegisterController@index');
        route::post('','RegisterController@signup');
    });

    Route::group(['prefix' => 'blog'], function () {
        Route::get('','BlogController@index');
        Route::get('/{detail}','BlogController@detail');
    });
>>>>>>> Stashed changes

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/dang-nhap','IndexController@getLogin')->name('getLogin');


Route::group(['prefix'=>'/admin','namespace'=>'Admin','as'=>'admin.','middleware'=>['auth','admin']],function (){
    Route::get('/dashboard','DashboardController@getDashboard')->name('dashboard');

    Route::resource('/category','CategoryController');
    Route::resource('/blogs','BlogController');

    //contact
    Route::get('/contact','ContactController@index')->name('getContact');
    Route::get('/single-contact/{id}','ContactController@singleContact')->name('singleContact');
    Route::delete('/delete-contact/{id}','ContactController@deleteContact')->name('deleteContact');

    //phe duyet bai viet tu author
    Route::get('/pending/blogs','BlogController@pending')->name('blog.pending');
    Route::put('/blog/{id}/approve','BlogController@approve')->name('blog.approve');
});


Route::group(['prefix'=>'/author','namespace'=>'Author','as'=>'author.','middleware'=>['auth','author']],function () {
    Route::get('/dashboard','DashboardController@getDashboard')->name('dashboard');

    Route::resource('blogs','BlogController');
});
