<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Lottery extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'parent_lottery_id',
        'county_id',
        'name',
        'prize',
        'entry_fee',
        'expire_at',
        'winner_id',
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
     * 
     * @param $query \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query){
        // var_dump(get_class($query));
        return $query->whereDate('expire_at', '>', Carbon::today()->toDateString());
    }

    /**
     * Relationships
     */
    public function county(){
        return $this->hasOne(County::class);
    }

    public function winner(){
        return $this->hasOne(User::class, 'winner_id');
    }
}
