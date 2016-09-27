<?php

Route::get('/', '\Magnetion\Colossus\FrontController@buildHomepage');

Route::get('colossus/login', '\Magnetion\Colossus\LoginController@login');
Route::post('colossus/login', ['as' => 'colossus.login.post', 'uses' => '\Magnetion\Colossus\LoginController@loginPost']);

Route::get('colossus/posts', '\Magnetion\Colossus\PostsController@list');

Route::get('{slug}', '\Magnetion\Colossus\FrontController@buildPage')->where('slug', '^.*');
