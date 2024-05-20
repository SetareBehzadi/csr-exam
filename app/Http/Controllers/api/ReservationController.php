<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TypePromotionRequest;
use App\Http\Resources\AllReservationResource;
use App\Http\Resources\ReservationResource;
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

        $promotion = $this->promotion->getFirstPromotionByRoom($typeId,$promotionType ,$reservation->check_in, $reservation->check_out);

        $discountAmount = 0;
        if ($promotion->type === 'percentage') {
            $discountAmount += ($promotion->discount / 100) * $reservation->total_cost;
        } elseif ($promotion->type === 'amount') {
            $discountAmount += $promotion->discount;
        }
        $reservation->promotion_amount = $discountAmount;
        $reservation->promotion_id = $promotion->id;
        $final = ($reservation->total_price - $discountAmount) +$reservation->tax ;
        $reservation->final_price = $final;
        $reservation->save();

        return new ReservationResource($reservation);
    }

    public function calculatePriceToReservation(Reservation $reservation)
    {
        $discount = $reservation->promotion_amount ?? 0;
        $tax = $reservation->tax;
        $total_price = $reservation->total_price;
        $final = ($total_price - $discount) +$tax ;

        $reservation->final_price = $final;
        $reservation->save();


    }
}
