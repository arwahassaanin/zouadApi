<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\EmailVerficationController;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;


// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

// Route::post('/test-upload', [ProfileController::class, 'uploadTest']);
//  Route::get('/test-cloudinary', [ProfileController::class, 'checkCloudinary']);

Route::post('/test-upload', function (Request $request) {
    if ($request->hasFile('photo')) {
        $imageUrl = Cloudinary::upload($request->file('photo')->getRealPath())
                    ->getSecurePath();
        return response()->json(['url' => $imageUrl]);
    } else {
        return response()->json(['error' => 'No file uploaded'], 400);
    }
});

