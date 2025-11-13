<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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
    public function getImageUrlAttribute()
    {
        $default = 'https://www.publicdomainpictures.net/pictures/10000/velka/open-bible-11288023214vduX.jpg'; // رابط الصورة الافتراضية
        if (!$this->image) return $default;

        if ($this->image && (str_starts_with($this->image, 'http://')
            || str_starts_with($this->image, 'https://'))) {
            return $this->image;
        }

        return url(Storage::url($this->image));
    }
    public function getCoverImageUrlAttribute()
    {
        $default = 'https://www.publicdomainpictures.net/pictures/10000/velka/open-bible-11288023214vduX.jpg'; // رابط الصورة الافتراضية

        if (!$this->cover_image) return   $default ;
        if ($this->image && (str_starts_with($this->cover_image, 'http://')
            || str_starts_with($this->cover_image, 'https://'))) {
         return $this->cover_image;
        }
        return url(Storage::url($this->cover_image));
    }
}
