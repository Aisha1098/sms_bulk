<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PackageResource extends JsonResource
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
            'is_custom' => $this->is_custom,
            'name' => $this->name,
            'total_sms' => $this->total_sms,
            'additional_sms' => $this->additional_sms,
        ];
    }
}
