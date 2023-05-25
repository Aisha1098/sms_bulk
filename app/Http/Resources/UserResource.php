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
        return [
            'id' => $this->id,
            'is_active' => $this->is_active,
            'profile_pic' => $this->profile_pic,
            'name' => $this->name,
            'email' => $this->email,
            'contact' => $this->contact,
            'email_verified_at' => $this->email_verified_at,
            'password' => $this->password
        ];
    }
}
