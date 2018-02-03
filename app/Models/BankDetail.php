<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BankDetail extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'bank_name',
        'account_number',
        'sort_code'
    ];

    public function notComplete()
    {
        return ! ($this->bank_name and $this->account_number and $this->sort_code);
    }

    public function complete()
    {
        return ($this->bank_name and $this->account_number and $this->sort_code);
    }

    /**
     * Relations
     */
    public function bankDetail()
    {
        return $this->BelongsTo(User::class);
    }
}
