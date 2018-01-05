<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class ParentLottery extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'county_id',
        'name',
        'status',
        'prize',
        'entry_fee',
        'expire_at',
        'always_active',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'expire_at'
    ];

    /**
     * Return only active lotteries
     */
    public function scopeNotExpired($query){
        return $query->whereDate('expire_at', '>', Carbon::today()->toDateString());
    }

    /**
     * Return only deactive lotteries
     */
    public function scopeExpired($query){
        return $query->whereDate('expire_at', '<', Carbon::today()->toDateString());
    }

    /**
     * Return only deactive lotteries
     */
    public function scopeAlwaysActive($query){
        return $query->where('always_active', 'yes');
    }

    /**
     * Return the Current Active Lottery
     */
    public function currentLottery(){
        return $this->lotteries()->latest()->first();
    }



    /**
     * Relationships
     */
    public function county(){
        return $this->hasOne(County::class);
    }
    public function lotteries(){
        return $this->hasMany(Lottery::class, 'parent_lottery_id');
    }
}
