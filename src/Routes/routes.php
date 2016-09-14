<?php

Route::get('/', '\Magnetion\Colossus\FrontController@buildHomepage');

Route::get('{slug}', '\Magnetion\Colossus\FrontController@buildPage')->where('slug', '^.*');