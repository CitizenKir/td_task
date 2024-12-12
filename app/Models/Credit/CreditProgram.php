<?php

namespace App\Models\Credit;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreditProgram extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'percent'];
}
