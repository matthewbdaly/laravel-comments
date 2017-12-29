<?php

Route::post('/comments/submit', 'Matthewbdaly\LaravelComments\Http\Controllers\CommentController@store')->name('comments.submit');
