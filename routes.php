<?php
/**
 * Created by Seçkin Kılınç.
 */

// routes.php

/**
 * Uygulamanın route tanımlamalarını içeren dosya.
 */

Route::get('/bilgi/{id}', 'UserController@show');
Route::get('/getir/{id}', 'UserController@getir');
Route::get('/baglan/{id}', 'UserController@dbconnect'); //DB bağlantısı açıksa kullanılabilir.

Route::middleware('/user/{id}', 'AuthMiddleware');
