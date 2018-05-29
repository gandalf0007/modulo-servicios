<?php


/*----------------------------------Servicios ----------------------------------------------------*/
Route::get('servicios','ServiciosController@index');

Route::post('servicio-cambiar-status/{id}','ServiciosController@CambiarStatus');
Route::post('acceso-web-store/{id}','ServiciosController@accesoWebStore');
Route::put('acceso-web-update/{id}','ServiciosController@accesoWebUpdate');

Route::get('servicios-items','ServiciosController@ItemShow');
Route::post('servicios-items-store','ServiciosController@ItemStore');
Route::put('servicios-items-update/{id}','ServiciosController@ItemUpdate');
/*---------------------------------Servicios ----------------------------------------------------*/