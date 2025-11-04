<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\PasswordReset;
use App\Mail\ResetPasswordMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller
{

    // public function sendResetCode(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required|email|exists:users,email',
    //     ]);
    //     $user = User::where('email', $request->email)->first();
    //     $otp = rand(100000, 999999);

    //     PasswordReset::updateOrCreate(
    //         ['email' => $request->email],
    //         [
    //             'token' => $otp,
    //             'expires_at' => Carbon::now()->addMinutes(10)
    //         ]
    //     );

    //     try {
    //         Mail::to($user->email)->send(new ResetPasswordMail($otp));

    //     } catch (\Exception $e) {
    //         return response()->json(['message' => 'حدث خطأ أثناء إرسال البريد الإلكتروني'], 500);
    //     }

    //     return response()->json([
    //         'message' => 'تم إرسال كود إعادة التعيين إلى بريدك الإلكتروني',
    //         'otp' => $otp,
    //     ]);
    // }
    public function sendResetCode(Request $request)
{
    $request->validate([
        'email' => 'required|email|exists:users,email',
    ]);

    $user = User::where('email', $request->email)->first();
    $otp = rand(100000, 999999);

    $reset = PasswordReset::updateOrCreate(
        ['email' => $request->email],
        [
            'token' => $otp,
            'expires_at' => Carbon::now()->addMinutes(10)
        ]
    );

    try {
        Mail::to($user->email)->send(new ResetPasswordMail($otp));

        return response()->json([
            'message' => 'تم إرسال كود إعادة التعيين إلى بريدك الإلكتروني',
            'otp' => $otp,
            'debug' => [
                'user_email' => $user->email,
                'otp_saved' => $reset->token,
                'mail_status' => 'sent'
            ]
        ], 200);

    } catch (\Exception $e) {
        return response()->json([
            'message' => 'حدث خطأ أثناء إرسال البريد الإلكتروني',
            // 'error'   => $e->getMessage()
        ], 500);
    }
}

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'token' => 'required|digits:6',
        ]);
        $passwordReset = PasswordReset::where('email', $request->email)
            ->where('token', $request->token)
            ->first();
        if (!$passwordReset) {
            return response()->json(['message' => 'كود التحقق غير صحيح'], 400);
        }

        if (Carbon::now()->isAfter($passwordReset->expires_at)) {
            return response()->json(['message' => 'انتهت صلاحية كود التحقق'], 400);
        }

        return response()->json(['message' => 'تم التحقق من الكود بنجاح']);
    }
    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'token' => 'required|digits:6',
            'password' => 'required|min:6|confirmed',
        ]);
        $passwordReset = PasswordReset::where('email', $request->email)
            ->where('token',(string)$request->token)
            ->first();
        if (!$passwordReset) {
            return response()->json(['message' => 'كود التحقق غير صحيح'], 400);
        }

        if (Carbon::now()->isAfter($passwordReset->expires_at)) {
            return response()->json(['message' => 'انتهت صلاحية كود التحقق'], 400);
        }

        $user = User::where('email', $request->email)->first();
        $user->password = bcrypt($request->password);
        $user->save();

        // Delete the password reset record
        $passwordReset->delete();

        return response()->json([
            'message' => 'تم إعادة تعيين كلمة المرور بنجاح'
        ]);
    }
}
