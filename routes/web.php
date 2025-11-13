<?php

use App\Services\GmailService;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/hash', function () {
//     return sha1('arwa@example.com');
// });

// Route::get('/test-mail', function () {
//     try {
//         Mail::raw('هذا اختبار من زواد عبر Resend ✉️', function ($message) {
//             $message->to('arwahassanien2002@gmail.com')
//                     ->subject('اختبار إرسال البريد من زواد');
//         });

//         return '✅ تم إرسال البريد بنجاح عبر Resend.';
//     } catch (\Exception $e) {
//         return '❌ فشل الإرسال: ' . $e->getMessage();
//     }
// });

// Route::get('/gmail/connect', function (GmailService $gmail) {
//     return redirect($gmail->getAuthUrl());
// });

// Route::get('/gmail/callback', function (Request $request, GmailService $gmail) {
//     if (!$request->has('code')) {
//         return '❌ No code returned from Google';
//     }

//     $gmail->handleCallback($request->code);

//     return '✅ Gmail connected successfully!';
// });

// Route::get('/gmail/send', function (GmailService $gmail) {
//     $gmail->sendEmail('example@gmail.com', 'Test Email', 'Hello from Laravel!');
//     return 'Email sent!';
// });
Route::get('/test-mail', function () {
    try {
        Mail::raw('هذا اختبار من زوّاد عبر Mailtrap ✉️', function ($message) {
            $message->to('arwahassanien2002@gmail.com')
                    ->subject('اختبار إرسال البريد من زوّاد');
        });

        return '✅ تم إرسال البريد بنجاح عبر Mailtrap.';
    } catch (\Exception $e) {
        return '❌ فشل الإرسال: ' . $e->getMessage();
    }
});
