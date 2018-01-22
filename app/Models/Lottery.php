<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
        'expire_at',
    ];

    /**
     * Return only Not Expired lotteries
     *
     * @param $query \Illuminate\Database\Eloquent\Builder
     */
    public function scopeNotExpired($query)
    {
        // var_dump(get_class($query));
        return $query->whereDate('expire_at', '>', Carbon::today()->toDateString());
    }

    /**
     * Return only Expired lotteries
     *
     * @param $query \Illuminate\Database\Eloquent\Builder
     */
    public function scopeExpired($query)
    {
        // var_dump(get_class($query));
        return $query->whereDate('expire_at', '<', Carbon::today()->toDateString());
    }

    /**
     * Tells if the Lottery Has a winner
     */
    public function hasWinner()
    {
        return $this->winner_id ? true : false;
    }

    /**
     * Tells if the Lottery Has Expired
     */
    public function hasExpired()
    {
        return $this->expire_at->lt(Carbon::now());
    }

    /**
     * Tells if the Lottery is Active
     */
    public function isActive()
    {
        return !$this->expire_at->lt(Carbon::now());
    }

    public function entryInPound()
    {
        return $this->entry_fee / 100;
    }

    /**
     * Relationships
     */
    public function county()
    {
        return $this->hasOne(County::class);
    }

    public function winner()
    {
        return $this->belongsTo(User::class, 'winner_id');
    }

    public function participants()
    {
        return $this->belongsToMany(User::class, 'user_lotteries', 'lottery_id', 'user_id');
    }

    public function draws()
    {
        return $this->hasMany(UserLottery::class);
    }
}
