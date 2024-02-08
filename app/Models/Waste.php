<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Waste extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_type',
        'order_id',
        'user_id',
        'product_id',
        'status_code',
        'star',
        'review',
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function picture() {
        return $this->hasMany(WasteImage::class, 'waste_id', 'id');
    }
}
