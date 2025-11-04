<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/hash', function () {
    return sha1('arwa@example.com');
});

