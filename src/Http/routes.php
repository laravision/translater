<?php 

Route::group(['prefix'=>'translater','middleware' => TranslaterMiddleware()],function(){


	Route::get('/','Laravision\Translater\Http\Controllers\AppController@index')->name('translater.index');

	Route::get('home','Laravision\Translater\Http\Controllers\AppController@home')->name('translater.home');

	Route::get('{lang?}','Laravision\Translater\Http\Controllers\AppController@translate')->name('translater.run');

});
