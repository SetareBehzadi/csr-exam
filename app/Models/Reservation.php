<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $table = 'reservations';
    protected $guarded = ['id'];

    public function getAllReservationByUser($userId)
    {
       $reserve =self::where('user_id', $userId)
           ->with(['guest.user', 'room']);
       return $reserve->paginate(10);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function guest()
    {
        return $this->belongsTo(Guest::class, 'user_id', 'user_id');
    }
}
