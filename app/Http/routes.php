<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/galerie','pageController@gallery')->name("gallery");
Route::post('/galerie/form','pageController@galleryRequestForm')->name("gallery.requestForm");
Route::group(['middleware' => 'gallery'], function () {
    Route::get('file/{id}/{name}','fileController@getFile');
    Route::get('/galerie/form/{id}','pageController@galleryForm')->name("gallery.form");
    Route::get('/galerie/{id}','pageController@galleryShow')->name("gallery.show");
    Route::get('/galerie/stahuj/{id}','pageController@downloadZip')->name("gallery.downloadZip");

});

Route::group(['prefix' => '/admin','middleware' => 'auth'], function () {

    Route::get('/', 'adminController@index')->name('admin.index');;

    Route::resource('/galerie','galleryController');

    Route::resource('/reference','referenceController');

    Route::resource('/swiper-kniha','bookController',
        ['except' =>
            [
                'edit' ,'update'
            ]
        ]
    );

    Route::resource('/partneri','partnerController');


});

Route::resource('admin','eventController',
    ['except' =>
        [
            'create' ,'show', 'update', 'edit'
        ]
    ]
);

Route::get('/lang/{lang}','langController@setLanguage')->name('setLang');

Route::get('/','pageController@index')->name("home");
Route::get('/o-nas','pageController@about')->name("about");
Route::get('/kontakt','pageController@contact')->name("contact");
Route::get('/reference','pageController@references')->name("references");
Route::get('/sluzby','pageController@services')->name("services");
Route::get('/partneri','pageController@partners')->name("partners");



Route::auth();

Route::get('/home', 'HomeController@index');
