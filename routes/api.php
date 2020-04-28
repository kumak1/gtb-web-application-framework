<?php

Route::middleware('api')->group(function () {
    Route::delete('logs', function () {
        exec(': > ../storage/logs/laravel.log');
    });

    Route::get('logs', function () {
        return file_get_contents('../storage/logs/laravel.log');
    });

    Route::get('routes', function () {
        exec('cd ..; php artisan route:list', $res);
        return implode(PHP_EOL, $res);
    });

    // Edit the botttom from here!
    Route::get('comments', 'CommentController@index');
    Route::get('comments/{comment}', 'CommentController@show');
    Route::post('comments', 'CommentController@store');
    Route::put('comments/{comment}', 'CommentController@update');
    Route::patch('comments/{comment}', 'CommentController@update');
    Route::delete('comments/{comment}', 'CommentController@destroy');
});
