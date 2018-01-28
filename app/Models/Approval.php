<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Approval extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'lottery_id',
        'user_id'
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
        return $this->belongsTo(Users::class);
    }
}
