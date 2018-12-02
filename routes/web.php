<?php
//==============================
// ROTAS PARA TCCS
//==============================

Route::post('/create', 'WorkController@createWork');
Route::get('/', 'WorkController@getWorks');
Route::get('/form', 'WorkController@createForm');
Route::get('/show/{work}', 'WorkController@getWork');
Route::get('/update/form/{work}', 'WorkController@updateForm');
Route::put('/update/{work}', 'WorkController@updateWork');
Route::delete('/delete/{work}', 'WorkController@deleteWork');
Route::get('/download/{filename}', 'WorkController@download');
Route::get('/index2', 'WorkController@shows');


