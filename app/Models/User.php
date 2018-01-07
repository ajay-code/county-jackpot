<?php

namespace App\Models;

use Laravel\Cashier\Billable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'gender', 'county_id' ,'phone', 'street_address', 'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Relationships
     */
    public function socialProviders()
    {
        return $this->hasMany(SocialProvider::class);
    }

    public function transactions()
    {
        return $this->hasMany(LotteryTransaction::class);
    }

    public function lotteriesWon()
    {
        return $this->hasMany(Lottery::class, 'winner_id');
    }

    public function lotteries(){
        return $this->hasMany(UserLottery::class, 'user_id');
    }
}
