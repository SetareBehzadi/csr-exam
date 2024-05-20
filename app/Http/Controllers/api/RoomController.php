<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CheckAvailableRoomsRequest;
use App\Http\Resources\AvailableRoomsResource;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function __construct(private Room $roomObj,){}

    public function getAvailableRooms(CheckAvailableRoomsRequest $request)
    {
      $rooms =  $this->roomObj->availableRooms($request['checkIn'], $request['checkOut'], $request['guestCount']);
        if (empty($rooms)) {
            return response()->json(['message' => 'No available rooms found'], 404);
        }
      return new AvailableRoomsResource($rooms);
    }
}
