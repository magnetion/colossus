<?php

Route::get('/', '\Magnetion\Colossus\FrontController@buildHomepage');

Route::get('{slug}', function($slug) {

})->where('slug', '^.*');