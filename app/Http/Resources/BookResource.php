<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
            //if(this->user)$this->user->name else null
        'id'=>$this->id,
        'user_name'=>$this->user?$this->user->name:null,
        'faculty name'=>$this->faculty?$this->faculty->name:null,
        'title'=>$this->title,
        'author'=>$this->author,
        'image'=>$this->image,
        'cover_image'=>$this->cover_image,
        'condition'=>$this->condition,
        'status'=>$this->status,
        'created_at'=>$this->created_at ? $this->created_at->format('d/m/Y H:i') : null,
        ];
    }
}
