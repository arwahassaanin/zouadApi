<?php

namespace App\Http\Controllers\Api;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\BookResource;
use App\Http\Resources\BookReviewDetaileResource;

class myBookController extends Controller
{
    //
    public function myBooks()
    {
        $books = Book::where('user_id', auth()->id())->get();

        return response()->json([
            'success' => true,
            'books' =>  BookResource::collection($books)
        ]);
    }
    public function borrowed()
    {
        // نفترض إنو عندك عمود اسمه "status" بيحدد حالة الكتاب
        // "معار" مثلاً
        $books = Book::where('user_id', auth()->id())
            ->where('status', 'غير متوفر')
            ->get();

        return response()->json([
            'success' => true,
            'books' => BookResource::collection($books)
        ]);
    }
    public function available()
    {
        $books = Book::where('user_id', auth()->id())
            ->where('status', 'متوفر')
            ->get();

        return response()->json([
            'success' => true,
            'books' =>  BookResource::collection($books)
        ]);
    }
    public function BookFaculties()
    {
        $books = Book::all()->groupBy('faculty');

        return response()->json([
            'message' => 'تم جلب الكتب لكل كلية بنجاح',
            'data' => $books
        ]);
    }
    public function show($id)
    {
        $book = Book::with(['user', 'reviews'])->findOrFail($id);

        if (!$book) {
            return response()->json([
                'success' => false,
                'message' => 'الكتاب غير موجود'
            ], 404);
        }


        return response()->json([
            'success' => true,
            'book' => new BookReviewDetaileResource($book)
        ]);
    }
}
