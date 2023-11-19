<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderExplore extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_tiket',
        'explore_id',
        'user_id',
        'qty',
        'date',
        'total_ticket_price',
        'voucher_id',
        'coin',
        'unique_code',
        'grand_total_price',
        'status_code', 
        'waste_flag',
    ];

    public function explore() {
        return $this->belongsTo(Explore::class, 'explore_id', 'id');
    }
}
