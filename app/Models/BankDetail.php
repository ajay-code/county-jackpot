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
        'user_id', 'iban', 'bban',
        'bank_identifier', 'branch_identifier', 'account_number'
    ];

    public function notComplete()
    {
        return ! ($this->iban and $this->bban and $this->bank_identifier and $this->branch_identifier and $this->account_number);
    }

    /**
     * Relations
     */
    public function bankDetail()
    {
        return $this->BelongsTo(User::class);
    }
}
