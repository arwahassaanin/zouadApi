<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookReviewDetaileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $reviewsCount = $this->reviews->count();
        $averageRating = $reviewsCount > 0 ? round($this->reviews->avg('rating'), 1) : null;

        return [
            'id'=>$this->id,
            'title'=>$this->title,
            'image_url' => $this->image ? asset('storage/' . $this->image) : null,
            'cover_image' => $this->cover_image ? asset('storage/' . $this->cover_image) : null,
            'rating' => $averageRating,
             'user' => [
                'id' => $this->user->id,
                'name' => $this->user->name,
                'email' => $this->user->email,
                'location' => $this->user->location,
            ],
             'comment' => $this->reviews->comment,



        ];
    }
}
