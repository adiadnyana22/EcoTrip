<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'wisata_id',
        'user_id',
        'qty',
        'date',
        'total_ticket_price',
        'voucher_id',
        'coin',
        'unique_code',
        'grand_total_price',
        'status_code',
    ];
}
