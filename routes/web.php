<?php
//==============================
// ROTAS PARA TCCS
//==============================

Route::post('/create', 'WorkController@createWork')->middleware('auth');
Route::get('/', 'WorkController@shows');
Route::get('/form', 'WorkController@createForm')->middleware('auth');
Route::get('/show/{work}', 'WorkController@getWork');
Route::get('/update/form/{work}', 'WorkController@updateForm')->middleware('auth');
Route::put('/update/{work}', 'WorkController@updateWork')->middleware('auth');
Route::delete('/delete/{work}', 'WorkController@deleteWork')->middleware('auth');
Route::get('/download/{filename}', 'WorkController@download');
Route::get('/admin', 'WorkController@getWorks')->middleware('auth');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
