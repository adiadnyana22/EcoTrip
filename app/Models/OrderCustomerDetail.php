<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderCustomerDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'gender',
        'telp',
        'nationality',
        'order_id',
    ];

    public function order() {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }
}
