<?php

use App\Http\Controllers\Api\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/faculties',[HomeController::class,'index']);
 // عرض تصنيف واحد مع كتبه
Route::get('/faculties/{id}',[HomeController::class,'show']);
Route::get('/book/{id}', [HomeController::class, 'showBook']);

//سيرش
Route::get('/books/search',[HomeController::class,'search']);
Route::get('/filter',[HomeController::class,'filter']);

//اضافة كتاب
Route::middleware('auth:sanctum')->post('/book', [HomeController::class, 'store']);
