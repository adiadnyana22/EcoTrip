<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_tiket',
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
        'waste_flag',
    ];

    public function wisata() {
        return $this->belongsTo(Wisata::class, 'wisata_id', 'id');
    }
}
