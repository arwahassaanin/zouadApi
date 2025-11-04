<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    //
    protected $fillable = [
        'title',
        'description',
        'user_id',
        'status',
        'book_id',
        'reportable_id',
        'reportable_type',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function reportable()
    {
        return $this->morphTo();
    }
}
