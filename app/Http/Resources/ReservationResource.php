<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReservationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'guest_name' => $this->guest->user->getDisplayName(),
            'guest_mobile_number' => $this->guest->mobile_number,
            'check_in' => $this->check_in,
            'check_out' => $this->check_out,
            'room' => new RoomResource($this->room),
            'tax' => $this->tax,
        ];
    }
}
