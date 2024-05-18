<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CheckAvailableRoomsRequest;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function __construct(private Room $roomObj,){}

    /**
     * Get available rooms based on the checkIn,checkOut,guestCount.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAvailableRooms(CheckAvailableRoomsRequest $request)
    {
      $rooms =  $this->roomObj->availableRooms($request['checkIn'], $request['checkOut'], $request['guestCount']);
      \Log::info($rooms);
      return response()->json($rooms);
    }
}
