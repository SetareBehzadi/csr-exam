<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TypePromotionRequest;
use App\Http\Resources\AllReservationResource;
use App\Models\Promotion;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function __construct(private Reservation $reservation,private Promotion $promotion){}

    public function gatUserReservations(User $user)
    {
        $reservations = $this->reservation->getAllReservationByUser($user->id);

        return new AllReservationResource($reservations);
    }

    public function applyPromotionToReservation(Reservation $reservation,Request $request)
    {
        $typeId = ($request->type == 'room') ? $reservation->room_id : $reservation->user_id;
        $promotionType = ($request->type == 'room')?'Models\Room':'Models\User';

        $promotions = $this->promotion->getAllPromotionByRoom($typeId,$promotionType ,$reservation->check_in, $reservation->check_out);

        $discountAmount = 0;
        foreach ($promotions as $promotion) {
            if ($promotion->type === 'percentage') {
                $discountAmount += ($promotion->discount / 100) * $reservation->total_cost;
            } elseif ($promotion->type === 'amount') {
                $discountAmount += $promotion->discount;
            }
        }

        $totalCostAfterDiscount = $reservation->total_price - $discountAmount;
        $reservation->total_price = $totalCostAfterDiscount;
        $reservation->save();

        return response()->json('OK',201);
    }
}
