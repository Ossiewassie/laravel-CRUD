<?php
Route::get('/', function() {
    return redirect(route('games.index'));
})->name('index');

Route::prefix('games')->name('games.')->group(function () {
    Route::get('/', 'GamesController@index')->name('index');
    Route::get('/{game}/edit', 'GamesController@edit')->name('edit');
    Route::patch('/{game}', 'GamesController@update')->name('update');
    Route::get('/create', 'GamesController@create')->name('create');
    Route::post('/', 'GamesController@store')->name('store');
    Route::delete('/{game}', 'GamesController@delete')->name('delete');
});

Route::prefix('developers')->name('developers.')->group(function () {
    Route::get('/', 'DevelopersController@index')->name('index');
    Route::get('/{developer}/edit', 'DevelopersController@edit')->name('edit');
    Route::patch('/{developer}', 'DevelopersController@update')->name('update');
    Route::get('/create', 'DevelopersController@create')->name('create');
    Route::post('/', 'DevelopersController@store')->name('store');
    Route::delete('/{developer}', 'DevelopersController@delete')->name('delete');
});

Route::prefix('ratings')->name('ratings.')->group(function () {
    Route::get('/', 'RatingsController@index')->name('index');
    Route::get('/{rating}/edit', 'RatingsController@edit')->name('edit');
    Route::patch('/{rating}', 'RatingsController@update')->name('update');
    Route::get('/create', 'RatingsController@create')->name('create');
    Route::post('/', 'RatingsController@store')->name('store');
    Route::delete('/{rating}', 'RatingsController@delete')->name('delete');
});

Route::prefix('api/')->name('api.')->group(function () {
    Route::prefix('games')->name('api.games')->group(function () {

        Route::get('/', 'apiGamesController@index')->name('index');
    Route::get('/{rating}/edit', 'RatingsController@edit')->name('edit');
    Route::patch('/{rating}', 'RatingsController@update')->name('update');
    Route::get('/create', 'RatingsController@create')->name('create');
    Route::post('/', 'RatingsController@store')->name('store');
    Route::delete('/{rating}', 'RatingsController@delete')->name('delete');
    });
});