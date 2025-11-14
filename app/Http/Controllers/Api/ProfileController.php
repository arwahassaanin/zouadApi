<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\profileRequest;
use App\Http\Resources\profileResource;
use Illuminate\Support\Facades\Storage;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class ProfileController extends Controller
{
    //
    public function show(Request $request)
    {
        $user = $request->user();
        return response()->json([
            'msg'=>'profile',
            'user'=>new profileResource($user)

        ]);
    }
//    public function update(ProfileRequest $request)
//     {
//         $user = $request->user();
//         $validated = $request->validated();

//         $user->update([
//             'name' => $validated['name'],
//             'email' => $validated['email'],
//             'phone_number' => $validated['phone_number'],
//             'role' => $validated['role'],
//             'university_id' => $validated['university_id']?? null,
//             'national_id' => $validated['national_id']?? null,
//             'university' => $validated['university'],
//             'department' => $validated['department'],
//         ]);

//         if ($request->hasFile('image')) {
//             $profile = $user->profile ?: $user->profile()->create([]);

//             if ($profile->image && Storage::exists('public/' . $profile->image)) {
//                 Storage::delete('public/' . $profile->image);
//             }

//             $path = $request->file('image')->store('profiles', 'public');
//             $profile->update(['image' => $path]);
//         }

//         return response()->json([
//             'message' => 'تم تحديث الملف الشخصي بنجاح',
//             'user' => new profileResource($user->load('profile')),
//         ], 200);
//     }
public function update(profileRequest $request)
{
    $user = $request->user();
    $validated = $request->validated();

    // تحديث بيانات المستخدم
    $user->update([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'phone_number' => $validated['phone_number'],
        'role' => $validated['role'],
        'university_id' => $validated['university_id'] ?? null,
        'national_id' => $validated['national_id'] ?? null,
        'university' => $validated['university'],
        'department' => $validated['department'],
    ]);

    // تحديث الصورة
    $profile = $user->profile ?: $user->profile()->create([]);

    // حالة رفع ملف جديد
    if ($request->hasFile('image')) {
        $uploadedFileUrl = $request->file('image')->store('profiles', 'public');
        $profile->update(['image' => $uploadedFileUrl]);
    }
    // حالة رابط خارجي
    elseif (!empty($validated['image'])) {
        $profile->update(['image' => $validated['image']]);
    }
    // حالة إبقاء الصورة فاضية (null)
    elseif (!isset($validated['image'])) {
        $profile->update(['image' => null]);
    }

    return response()->json([
        'message' => 'تم تحديث الملف الشخصي بنجاح',
        'user' => new profileResource($user->load('profile')),
    ], 200);
}
}

