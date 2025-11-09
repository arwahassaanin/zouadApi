<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\EmailVerficationController;


// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

 Route::post('/test-upload', [ProfileController::class, 'testUpload']);
 Route::get('/test-cloudinary', [ProfileController::class, 'checkCloudinary']);


