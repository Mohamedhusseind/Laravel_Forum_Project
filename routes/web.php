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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify'=>true]);
Route::get('/profile',[App\Http\Controllers\HomeController::class,'profile'])->name('profile');
Route::post('/profile',[App\Http\Controllers\HomeController::class,'update_avatar'])->name('update_avatar');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');

//*********************LOGIN WITH SOCIAL MEDIA *****************

Route::get('/redirect/{service}','App\Http\Controllers\SocialController@redirect');
Route::get('/callback/{service}', 'App\Http\Controllers\SocialController@callback')->middleware('verified');
Route::get('/filable','App\Http\Controllers\CrudController@getoffer');


/*********************offers route *******************/


Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath']],function (){
    Route::group(['prefix'=>'offers'],function (){
        Route::get('create','App\Http\Controllers\CrudController@create')->name('offers.create');
        Route::post('store','App\Http\Controllers\CrudController@store')->name('offers.store');


        Route::get('edit/{offer_id}','App\Http\Controllers\CrudController@editOffer')->name('offers.edit');
        Route::post('update/{offer_id}','App\Http\Controllers\CrudController@updateOffer')->name('offers.update');


        Route::get('delete/{offer_id}','App\Http\Controllers\CrudController@deleteoffer')->name('offers.delete');


        Route::get('all','App\Http\Controllers\CrudController@getalloffers')->name('offers.all');
            Route::get('youtube','App\Http\Controllers\CrudController@getvideo')->name('offers.getvideo')->middleware('auth');

    });

});

///*************ajaxoffer*****************
Route::group(['prefix'=>'ajaxoffers'],function (){
    Route::get('create','App\Http\Controllers\OfferController@create')->name('ajaxoffers.create');
    Route::post('store','App\Http\Controllers\OfferController@store')->name('ajaxoffers.store');


});
