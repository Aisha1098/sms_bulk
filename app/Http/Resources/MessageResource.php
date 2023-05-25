<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MessageResource extends JsonResource
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
            'accoount_id' => $this->ccount_id,
            'template_id' => $this->template_id,
            'message' => $this->message,
            'send_at' => $this->send_at,
        ];
    }
}
