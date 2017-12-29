<?php

Route::post('/comments/submit', 'Matthewbdaly\LaravelComments\Http\Controllers\CommentController@store')->name('comments.submit');
Route::post('/comments/flag', 'Matthewbdaly\LaravelComments\Http\Controllers\CommentController@flag')->name('comments.flag');
