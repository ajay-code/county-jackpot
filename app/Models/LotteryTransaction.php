<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LotteryTransaction extends Model
{
    protected $fillable = [
        'user_id',
        'lottery_id',
        'amount',
        'charge_id',
    ];


    /**
     * Relationships
     */
    public function lottery()
    {
        return $this->belongsTo(Lottery::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
