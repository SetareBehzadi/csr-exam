<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Room extends Model
{
    use HasFactory;
    protected $table = 'rooms';
    protected $guarded = ['id'];

    protected $casts = [
        'amenities' => 'json',
    ];


    public function users()
    {
        return $this->belongsToMany(User::class, 'reservations')
            ->withPivot('check_in', 'check_out', 'tax')
            ->withTimestamps()
            ->withTrashed();
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function scopeFreeRooms(Builder $query, $checkIn, $checkOut, $guestCount = null)
    {
        $query->whereDoesntHave('reservations', function($query) use ($checkIn, $checkOut) {
            $query->where(function($query) use ($checkOut, $checkIn) {
                $query->where('check_out', '>', $checkIn)
                    ->where('check_in', '<', $checkOut);

            });
        });
    }
    public function availableRooms($checkIn, $checkOut, $guestCount=null )
    {
        $roomTypes = [
            1 => 'single',
            2 => 'double',
            3 => 'triple',
            4 => 'quadruple',
            5 => 'others'
        ];
        $roomType = $roomTypes[$guestCount] ?? 'others';

        $roomsQuery = self::query();
        $roomsQuery->freeRooms($checkIn, $checkOut, $guestCount);
        if ($roomType) {
            $roomsQuery->where('type', $roomType);
        }

        return $roomsQuery->paginate(10);

    }

    public function findValidByDates($checkIn, $checkOut, $guestCount=null)
    {
        $roomsQuery = self::query();
        $roomsQuery->freeRooms($checkIn, $checkOut, $guestCount);
        return $roomsQuery->get();
    }
}
