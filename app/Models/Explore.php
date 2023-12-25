<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Explore extends Model
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
        'type',
        'description',
        'activity',
        'includes',
        'itinerary',
        'rating',
        'order'
    ];

    public function order() {
        return $this->hasMany(OrderExplore::class, 'explore_id', 'id');
    }

    public function wishlist() {
        return $this->hasMany(WishlistExplore::class, 'explore_id', 'id');
    }
}
