<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;
    protected $guarded=['id'];
    protected $table = 'promotions';

    public function getAllPromotionByRoom($typeId,$type,$startDate=null,$endDate=null)
    {

        $promotionQuery = self::query();
        if ($startDate){
            $promotionQuery->where('date_start', '<', $startDate);
        }
        if ($endDate){
            $promotionQuery ->where('date_end', '>=',$endDate);
        }
       return $promotionQuery->where('promotionable_type', $type)
            ->where('promotionable_id', $typeId)
            ->get();
    }
}
