<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegistarRequest;
use Illuminate\Auth\Events\Registered;
use App\Http\Requests\StudentLoginRequest;
use App\Http\Requests\GraduateLoginRequest;
use App\Notifications\VerifyEmailNotification;

class AuthController extends Controller
{
    public function loginGraduate(GraduateLoginRequest $request)
    {
        $user = User::where('role', 'خريج')
            ->where('national_id', $request->national_id)
            ->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'البريد الإلكتروني أو كلمة المرور غير صحيحة.',
            ], 401);
        }

        if (!$user->hasVerifiedEmail() || !$user->is_verified) {
            return response()->json(['message' => 'حسابك غير مفعل بعد. يرجى التحقق من بريدك الإلكتروني.'], 403);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'تم تسجيل الدخول بنجاح.',
            'user' => new UserResource($user),
            'token' => $token,
        ]);
    }
    public function loginStudent(StudentLoginRequest $request)
    {
        $user = User::where('role', 'طالب')
            ->where('university_id', $request->university_id)
            ->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'الرقم الجامعي أو كلمة المرور غير صحيحة.',
            ], 401);
        }

        if (!$user->hasVerifiedEmail() || !$user->is_verified) {
            return response()->json(['message' => 'حسابك غير مفعل بعد. يرجى التحقق من بريدك الإلكتروني.'], 403);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'تم تسجيل الدخول بنجاح.',
            'user' => new UserResource($user),
            'token' => $token,
        ]);
    }
    public function register(RegistarRequest  $request)
    {

        $user_data=([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'university' => $request->university,
            // 'national_id' => $request->national_id,
            // 'university_id' => $request->university_id,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'department' => $request->department,
            'role' => $request->role,
        ]);
        if ($request->role === 'خريج') {
            $user_data['national_id'] = $request->national_id;
        }

        if ($request->role === 'طالب') {
            $user_data['university_id'] = $request->university_id;
        }
        $user = User::create($user_data);

        $user->sendEmailVerificationNotification();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'تم إنشاء الحساب بنجاح، يرجى التحقق من بريدك الإلكتروني.',
            'token' => $token,
            'user' => new UserResource($user),
            // 'verification_url' => $verificationUrl,  // الرابط الموقّع
            // 'fields' => FormFieldsController::registrationFields(),
        ]);
    }
}
