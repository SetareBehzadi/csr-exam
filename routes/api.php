<?php

use App\Http\Controllers\api\GuestController;
use App\Http\Controllers\api\ReservationController;
use App\Http\Controllers\api\RoomController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('available-rooms',[RoomController::class, 'getAvailableRooms']);
Route::post('reservations/{user}',[ReservationController::class, 'gatUserReservations']);
Route::get('users/birthdate', [GuestController::class, 'getUsersBirthday']);
Route::post('reservations/apply/promotion/{reservation}', [ReservationController::class, 'applyPromotionToReservation']);
