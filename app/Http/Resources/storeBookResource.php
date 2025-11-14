<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Resources\Json\JsonResource;

class storeBookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
        'id' => $this->id,
        'user_name' => $this->user ? $this->user->name : null,
        'phone_number' => $this->user ? $this->user->phone_number : null,
        'address' => $this->user ? $this->user->address : null,
        'faculty_name' => $this->faculty ? $this->faculty->name : null,
        'title' => $this->title,
        'author' => $this->author,
        'image' => $this->image_url,          // استخدم الـ Accessor
        'cover_image' => $this->cover_image_url,
        'condition' => $this->condition,
        'status' => $this->status,
        'created_at' => $this->created_at->format('Y-m-d H:i:s'),
    ];
    }
}
