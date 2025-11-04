<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\myBookController;

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/my-books', [myBookController::class, 'myBooks']);
    Route::get('/my-books/borrowed', [myBookController::class, 'borrowed']);
    Route::get('/my-books/available', [myBookController::class, 'available']);
});
Route::get('/books/faculties', [myBookController::class, 'BookFaculties']);
Route::get('/books/{id}', [myBookController::class, 'show']);
