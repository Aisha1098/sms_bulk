<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AccountResource extends JsonResource
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
            'user_id' => $this->user_id,
            'is_individual' => $this->is_individual,
            'is_corporate' => $this->is_corporate,
            'is_enterprise' => $this->is_entereprise,
            'is_monthly_invoice' => $this->is_monthly_invoice,
            'senderID' => $this->senderID,
            'sms_rate_lim' => $this->sms_rate_lim,
            'price' => $this->price
        ];
    }
}
