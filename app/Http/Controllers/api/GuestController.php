<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\GuestBirthdateResource;
use App\Models\Guest;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function getUsersBirthday()
    {
        $g = new Guest();
        $room = new Room();
        $nextMonthStart = Carbon::now()->addMonth()->startOfMonth();
        $nextMonthEnd = Carbon::now()->addMonth()->endOfMonth();

        $nextMonth = Carbon::now()->addMonth()->month;
        $guests = $g->findGustsByBirthdateInNextMonth($nextMonth);
        $result = []; // New array to store the result

        // otagh haye ke dar mahe ayande aslan reserv nashodan
        $validRooms = $room->findValidByDates($nextMonthStart, $nextMonthEnd);
        // agar hadeaghal yek mored ba preference moshtarak bod on otagh ro pishnahad bede
        foreach ($guests as $guest) {
            $guestRooms = [];
            if ($guest->preferences !== null) {
                $guestPreferences = json_decode(json_encode($guest->preferences), true);

                foreach ($validRooms as $room) {
                    $roomAmenities = json_decode(json_encode($room->amenities), true);

                    // بررسی تطابق حداقل یکی از amenities اتاق با یکی از preferences مهمان
                    $match = array_intersect($guestPreferences, $roomAmenities);

                    if (!empty($match)) {
                        $guestRooms[] = $room; // Add room to guestRooms array
                    }
                }
            }
            //age hichi moshtarak nadasht otaghaye khali ro neshonesh bede
            $guest->rooms = count($guestRooms) > 0 ? $guestRooms : $validRooms ;
        }

        return GuestBirthdateResource::collection($guests);
    }
}
