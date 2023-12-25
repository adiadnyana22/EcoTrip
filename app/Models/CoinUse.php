<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoinUse extends Model
{
    use HasFactory;

    protected $fillable = [
        'nominal',
        'type',
        'date',
        'description'
    ];
}
