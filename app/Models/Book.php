<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
    'title',
    'faculty_id',
    'user_id',
    'address',
    'condition',
    'status',
    'image',
    'cover_image',
];
    //
       public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function reviews()
    {
        return $this->hasMany(Review::class, 'book_id');
    }

    public function faculty()
    {
        return $this->belongsTo(Faculty::class, 'faculty_id');
    }
}
