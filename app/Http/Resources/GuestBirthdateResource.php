<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GuestBirthdateResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
           'guest_name' => $this->user->displayName,
            'guest_mobile_number' => $this->mobile_number,
            'birthdate' => $this->birthdate,
           'recomended_rooms' => RoomResource::collection($this->rooms),
        ];
    }
}
