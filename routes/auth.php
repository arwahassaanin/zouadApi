<?php

use Carbon\Carbon;
use App\Models\User;
use App\Mail\ResetPasswordMail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ForgotPasswordController;
use App\Http\Controllers\Api\EmailVerficationController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

Route::post('/login/student', [AuthController::class, 'loginStudent'])->name('login.student');
Route::post('/login/graduate', [AuthController::class, 'loginGraduate'])->name('login.graduate');

//for forgitten password
Route::get('/test-mail', function () {
    Mail::to('arwahassanien2002@gmail.com')->send(new ResetPasswordMail('123456'));
    return 'تم إرسال البريد بنجاح ✅';
});
Route::post('/forgot-password',[ForgotPasswordController::class, 'sendResetCode'])->name('forgot.password');
Route::post('/verify-otp', [ForgotPasswordController::class, 'verifyOtp'])->name('reset.password');
Route::post('/reset-password', [ForgotPasswordController::class, 'resetPassword']);

 Route::post('/register', [AuthController::class, 'register']);

 //راوت اجيب ايميل التفعيل
 Route::get('/test-verification-url/{id}', function ($id) {
    $user = User::findOrFail($id);
    return URL::temporarySignedRoute(
        'verification.verify',
        Carbon::now()->addMinutes(60),
        ['id' => $user->id, 'hash' => sha1($user->email)]
    );
});

// راوت تحقق وتوثيقه  من ايميل
Route::get('/email/verify/{id}/{hash}', function (Request $request, $id, $hash) {
    $user = User::findOrFail($id);

    if (! hash_equals((string) $hash, sha1($user->getEmailForVerification()))) {
        return response()->json(['message' => 'الرابط غير صالح'], 400);
    }

    if ($user->hasVerifiedEmail()) {
        return response()->json(['message' => 'البريد موثق بالفعل.'], 200);
    }

    $user->markEmailAsVerified();
    $user->is_verified = 1;
    $user->save();

    return response()->json(['message' => 'تم توثيق البريد الإلكتروني بنجاح.'], 200);
})->middleware(['signed'])->name('verification.verify');
