<?php

//search routes
Route::get('/search', ['as' => 'eloquent-search', 'uses' => '\Jzpeepz\EloquentSearch\Http\Controllers\SearchController@index']);
