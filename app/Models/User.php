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
        'name', 'email', 'password', 'gender', 'county_id' ,'phone', 'street_address', 'dob' , 'status', 'balance'
    ];

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['dob'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * This method is called on booting of model
     */
    protected static function boot()
    {
        parent::boot();
        static::created(function ($user) {
            $user->bankDetail()->create();
        });

        static::deleting(function ($user) {
            $user->bankDetail()->delete();
            $user->lotteries()->delete();
            $user->approvals()->delete();
            $user->getPaids()->delete();
            $user->lotteriesWon()->update(['winner_id' => null]);
        });
    }

    /**
     * Helpers
     */
    public function hasBalance()
    {
        return $this->balance > 0;
    }

    public function isActive()
    {
        return $this->status == 'active';
    }

    public function isDeactive()
    {
        return $this->status == 'deactive';
    }

    public function isUser()
    {
        return true;
    }

    /**
     * Relationships
     */

    public function county()
    {
        return $this->belongsTo(County::class);
    }
    
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

    public function lotteries()
    {
        return $this->hasMany(UserLottery::class);
    }

    public function approvals()
    {
        return $this->hasMany(Approval::class);
    }
    public function bankDetail()
    {
        return $this->hasOne(BankDetail::class);
    }
    public function getPaids()
    {
        return $this->hasMany(GetPaid::class);
    }

}
