<?php

namespace App\Http\Controllers\Api;

use id;
use App\Models\Book;
use App\Models\Faculty;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\BookResource;
use App\Http\Requests\storeBookRequest;
use App\Http\Resources\FacultyResource;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\storeBookResource;
use App\Http\Resources\BookDetailesResoure;

class HomeController extends Controller
{
    //
    public function index()
    {
        return response()->json([
            'msg' => 'success',
            'Faculties' => Faculty::all()
        ]);
    }
    // عرض تصنيف واحد مع كتبه
    public function show($id)
    {
        $faculty = Faculty::with('books.user', 'books.faculty')->findOrFail($id);
        return response()->json([
            'Faculty' => new FacultyResource($faculty)
        ]);
    }
    public function search(Request $request)
    {
        $query = Book::query();
        $name = $request->query('title');
        if ($name) {
            $query->where('title', 'like', "%{$name}%");
        } else {
            return response()->json([
                'message' => 'الكتاب غير موجود',
                'data' => []
            ], 400);
        }
        $books = $query->with('user', 'faculty')->get();
        if ($books->isEmpty()) {
            return response()->json([
                'message' => 'لا يوجد كتب تتطابق مع ". $name ."',
                'data' => []
            ], 404);
        }
        return response()->json([
            'msg' => 'تم العثور على الكتب',
            'Books' => BookResource::collection($books)
        ]);
    }
    public function showBook($id)
    {
        $book = Book::with('user')->findOrFail($id);
        return response()->json([
            'Book' => new BookDetailesResoure($book)
        ]);
    }
    public function filter(Request $request)
    {
        $query = Faculty::query();
        $name = $request->query('name');
        if ($name) {
            $query->where('name', 'like', "%{$name}%");
        } else {
            return response()->json([
                'message' => 'يرجى ادخال اسم التخصصص',

            ], 400);
        }
        $faculty = $query->with('books')->get();
        if ($faculty->isEmpty()) {
            return response()->json([
                'message' => 'لا يوجد تخصص يتطابق مع ' . $name,

            ], 404);
        }
        return response()->json([
            'msg' => 'تم العثور على التخصص',
            'faculty' => FacultyResource::collection($faculty)
        ]);
    }
    public function store(storeBookRequest $request)
    {


        $imagePath = $request->file('image') ? $request->file('image')->store('books', 'public') : null;
        $coverPath = $request->file('cover_image') ? $request->file('cover_image')->store('covers', 'public') : null;
        $faculty = Faculty::where('name', $request->name)->first();
        if (!$faculty) {
            return response()->json([
                'message' => 'اسم الكلية غير موجود.'
            ], 404);
        }

        $book = Book::create([
            'image' => $imagePath ? Storage::url($imagePath) : null,
            'cover_image' => $coverPath ? Storage::url($coverPath) : null,
            'title' => $request->title,
            'faculty_id' => $faculty->id,
            // 'phone_number' => auth()->user()->phone_number,
            'condition' => $request->condition,
            'status' => $request->status,
            'user_id' => auth()->id(),
            // 'address' => auth()->user()->address,
        ]);
        return response()->json([
            'msg' => 'تم اضافة الكتاب بنجاح',
            'book' => new storeBookResource($book)
        ], 201);
    }
}
