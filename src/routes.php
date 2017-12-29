<?php

Route::post('/comments/submit', 'Matthewbdaly\LaravelComments\Http\Controllers\CommentControler@store')->name('comments.submit');
