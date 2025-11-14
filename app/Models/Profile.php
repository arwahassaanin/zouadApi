<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model
{
      use HasFactory;
      protected $fillable = [
        'user_id',
        'image',
        'bio'
      ];
    //
    public function user()
{
    return $this->belongsTo(User::class);
}
public function getImageUrlAttribute()
{
    if (!$this->image) {
        return null; // الصورة فاضية
    }

    // إذا كانت الصورة رابط HTTP أو HTTPS
    if ($this->image && (str_starts_with($this->image, 'http://')
            || str_starts_with($this->image, 'https://'))) {
        return $this->image;
    }

    // الصورة محفوظة داخل storage
  return url(Storage::url($this->image));}





}
