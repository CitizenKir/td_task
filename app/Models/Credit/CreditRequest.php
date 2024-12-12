<?php

namespace App\Models\Credit;

use Illuminate\Database\Eloquent\Model;

class CreditRequest extends Model
{
    protected $fillable = ['car_id', 'credit_program_id', 'initial_payment', 'loanTerm'];
}
