<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ParentLottery extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'county_id',
        'name',
        'prize',
        'entry_fee',
        'expire_at',
        'always_active',
        'featured'
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
        'deleted_at'
    ];

    /**
     * Return only active lotteries
     */
    public function scopeNotExpired($query)
    {
        return $query->whereDate('expire_at', '>=', Carbon::today()->toDateString());
    }

    /**
     * Return only deactive lotteries
     */
    public function scopeExpired($query)
    {
        return $query->whereDate('expire_at', '<', Carbon::today()->toDateString());
    }

    /**
     * Return only deactive lotteries
     */
    public function scopeAlwaysActive($query)
    {
        return $query->where('always_active', 'yes');
    }

    /**
     * Return only deactive lotteries
     */
    public function scopeFeatured($query)
    {
        return $query->where('featured', true);
    }

    /**
     * Return only deactive lotteries
     */
    public function scopeNotFeatured($query)
    {
        return $query->where('featured', false);
    }

    /**
     * Return the Current Active Lottery
     */
    public function currentLottery()
    {
        return $this->hasOne(Lottery::class, 'parent_lottery_id')->latest();
    }

    /**
     * Tells if the Lottery is Active
     */
    public function isActive()
    {
        return !$this->expire_at->lt(Carbon::now());
    }

    public function isFeatured()
    {
        return !!$this->featured;
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
    public function lotteries()
    {
        return $this->hasMany(Lottery::class, 'parent_lottery_id');
    }
}
