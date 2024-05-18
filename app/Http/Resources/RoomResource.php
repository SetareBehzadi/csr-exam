<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RoomResource extends JsonResource
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
            'type' => $this->type,
            'count' => $this->count,
            'dominantType' => $this->dominant_type,
            'price' => $this->price,
            'amenities' => $this->amenities,
            'reservedAt' => $this->created_at,
        ];
    }
}
