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
            'guest_name' => $this->guest->user->displayName,
            'guest_mobile_number' => $this->guest->mobile_number,
            'check_in' => $this->check_in,
            'check_out' => $this->check_out,
            'room' => new RoomResource($this->room),
            'tax' => $this->tax,
            'total_price' => $this->total_price,
            'discount_price' => $this->promotion_amount,
            'final_price' => $this->total_price,
        ];
    }
}
