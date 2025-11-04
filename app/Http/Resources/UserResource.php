<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return
        [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'university' => $this->university,
            'national_id' => $this->national_id,
            'university_id' => $this->university_id,
            'phone_number' => $this->phone_number,
            'address' => $this->address,
            'department' =>$this->department,
            'is_verified' => $this->is_verified,
            'email_verified_at' => $this->email_verified_at,
            'role' => $this->role,
            'created_at'=>$this->created_at
        ];
    }
}
