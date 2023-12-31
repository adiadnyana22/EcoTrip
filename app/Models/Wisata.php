<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'picture',
        'local_price',
        'local_weekend_price',
        'foreign_price',
        'foreign_weekend_price',
        'location',
        'description',
        'activity',
        'includes',
        'rating',
        'order'
    ];

    public function order() {
        return $this->hasMany(Order::class, 'wisata_id', 'id');
    }

    public function wishlist() {
        return $this->hasMany(Wishlist::class, 'wisata_id', 'id');
    }
}
