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

        if ($request->hasFile('image')) {
            $profile = $user->profile ?: $user->profile()->create([]);

            if ($profile->image) {
                $publicId = pathinfo($profile->image, PATHINFO_FILENAME);
                Cloudinary::destroy($publicId);
            }

            $uploadedFileUrl = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();

            $profile->update(['image' => $uploadedFileUrl]);
        }

        return response()->json([
            'message' => 'تم تحديث الملف الشخصي بنجاح',
            'user' => new profileResource($user->load('profile')),
        ], 200);
    }
public function uploadTest(Request $request)
    {
        $request->validate([
            'image' => 'required|image|max:2048', // 2MB
        ]);

        // رفع الصورة على Cloudinary
        $uploadedFileUrl = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();

        return response()->json([
            'message' => 'تم رفع الصورة بنجاح!',
            'url' => $uploadedFileUrl
        ]);
    }

    public function checkCloudinary()
    {
        dd(env('CLOUDINARY_URL'));
    }
}

