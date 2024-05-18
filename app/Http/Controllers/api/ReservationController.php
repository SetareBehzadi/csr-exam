<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AllReservationResource;
use App\Models\Reservation;
use App\Models\User;

class ReservationController extends Controller
{
    public function __construct(private Reservation $reservation,){}

    public function gatUserReservations(User $user)
    {
        $reservations = $this->reservation->getAllReservationByUser($user->id);

        return new AllReservationResource($reservations);
    }
}
