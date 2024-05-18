<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    use HasFactory;

    protected $casts = [
        'preferences' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function findGustsByBirthdateInNextMonth($month)
    {
        $guests =  $this->with(['user'])->whereMonth('birthdate', $month);

        return $guests->get();
    }
}
