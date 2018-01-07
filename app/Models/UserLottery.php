<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserLottery extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'lottery_id',
        'user_id',
        'lottery_transaction_id',
        'draw_number',
    ];

    /**
     * Relationships
     */
    
    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function transaction()
    {
        return $this->hasOne(LotteryTransaction::class);
    }

    public function lottery()
    {
        return $this->hasOne(Lottery::class);
    }
}
