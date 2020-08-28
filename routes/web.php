<?php
Route::group(['namespace' => 'Client'], function () {
    Route::get('','ClientController@index');
    Route::get('contact','ClientController@contact');

//   Route::get('login','LoginController@ShowLoginForm');

   Route::get('listing',"ClientController@listing");

   Route::group(['prefix' => 'register'], function () {
       route::get('','RegisterController@index');
       route::post('','RegisterController@signup');
   });

   Route::group(['prefix' => '/blog'], function () {
       Route::get('','BlogController@index')->name('client.blog');
       Route::get('/{detail}','BlogController@detail');
   });
});

Auth::routes();


Route::get('/dang-nhap','IndexController@getLogin')->name('getLogin');


Route::group(['prefix'=>'/admin','namespace'=>'Admin','as'=>'admin.','middleware'=>['auth','admin']],function (){
    Route::get('/dashboard','DashboardController@getDashboard')->name('dashboard');

    Route::resource('/category','CategoryController');
    Route::resource('/blogs','BlogController');
    Route::resource('/information','InformationController');

    Route::resource('type-asset','TypeAssetController');
    Route::resource('users','UsersController');
    Route::resource('comment-blog','CommentBlogController');
    Route::resource('comment-information','CommentInformationController');

    Route::get('/admin-user','UsersController@getAdminUser')->name('getAdminUser');
    Route::get('/change-password','UsersController@editPassword')->name('editPassword');
    Route::post('/change-password','UsersController@postEditPassword')->name('postEditPassword');


    //contact
    Route::get('/contact','ContactController@index')->name('getContact');
    Route::get('/single-contact/{id}','ContactController@singleContact')->name('singleContact');
    Route::delete('/delete-contact/{id}','ContactController@deleteContact')->name('deleteContact');

    //phe duyet bai viet tu author
    Route::get('/pending/blogs','BlogController@pending')->name('blog.pending');
    Route::put('/blog/{id}/approve','BlogController@approve')->name('blog.approve');

    //phe duyet mua ban tu author
    Route::get('/pending/information','InformationController@pending')->name('information.pending');
    Route::put('/information/{id}/approve','InformationController@approve')->name('information.approve');

    //them anh cho mo ta cua bang information
    Route::get('/add-images/{id}','InformationController@getAddImages')->name('getInformationImages');
    Route::post('/add-images','InformationController@postAddImages')->name('postInformationImages');
    Route::delete('/delete-alt-image/{id}','InformationController@deleteAltImage')->name('deleteAltImage');

});


Route::group(['prefix'=>'/author','namespace'=>'Author','as'=>'author.','middleware'=>['auth','author']],function () {
    Route::get('/dashboard','DashboardController@getDashboard')->name('dashboard');

    Route::resource('blogs','BlogController');
    Route::resource('information','InformationController');
    Route::resource('users','UsersController');

    //doi mat khau
    Route::get('/change-password','UsersController@editPassword')->name('editPassword');
    Route::post('/change-password','UsersController@postEditPassword')->name('postEditPassword');

    //them anh cho mo ta cua bang information
    Route::get('/add-images/{id}','InformationController@getAddImages')->name('getInformationImages');
    Route::post('/add-images','InformationController@postAddImages')->name('postInformationImages');
    Route::delete('/delete-alt-image/{id}','InformationController@deleteAltImage')->name('deleteAltImage');
});
