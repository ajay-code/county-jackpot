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
        'county_id',
        'name',
        'status',
        'prize',
        'entry_fee',
        'expire_at'
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
    public function scopeActive($query){
        return $query->whereDate('expire_at', '>', Carbon::today()->toDateString());
    }

    /**
     * Relationships
     */
    public function county(){
        return $this->hasOne(County::class);
    }
}
