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
// Client
Route::group(['namespace' => 'Client'], function () {
    Route::get('','ClientController@index');

    Route::get('contact','ClientController@contact');

    Route::get('login','LoginController@ShowLoginForm');

    Route::group(['prefix' => 'registration'], function () {
        Route::get('','RegistrationController@index');
        Route::post('','RegistrationController@Signup');
    });

    Route::get('listing',"ClientController@listing");

    Route::group(['prefix' => 'blog'], function () {
        Route::get('','BlogController@index');
        Route::get('/{detail}','BlogController@detail');
    });
});
// Admin
// Route::get('/', function () {
//     return view('admin.layouts.master');
// });

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/dang-nhap','IndexController@getLogin')->name('getLogin');


//     Route::resource('/category','CategoryController');
//     Route::resource('/blogs','BlogController');

//     //contact
//     Route::get('/contact','ContactController@index')->name('getContact');
//     Route::get('/single-contact/{id}','ContactController@singleContact')->name('singleContact');
//     Route::delete('/delete-contact/{id}','ContactController@deleteContact')->name('deleteContact');
// });

//     //contact
//     Route::get('/contact','ContactController@index');
//     Route::get('/single-contact/{id}','ContactController@singleContact')->name('singleContact');
//     Route::delete('/delete-contact/{id}','ContactController@deleteContact')->name('deleteContact');
// });


// Route::group(['prefix'=>'/author','namespace'=>'Author','as'=>'author.','middleware'=>['auth','author']],function () {
//     Route::get('/dashboard','DashboardController@getDashboard')->name('dashboard');
// });
