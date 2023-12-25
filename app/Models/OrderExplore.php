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
        'qty_indonesia',
        'qty_foreign',
        'date',
        'total_ticket_price',
        'voucher_id',
        'voucher_nominal',
        'coin',
        'unique_code',
        'grand_total_price',
        'status_code', 
        'waste_flag',
    ];

    public function explore() {
        return $this->belongsTo(Explore::class, 'explore_id', 'id');
    }

    public function customer() {
        return $this->hasMany(OrderExploreCustomerDetail::class, 'order_id', 'id');
    }
}
