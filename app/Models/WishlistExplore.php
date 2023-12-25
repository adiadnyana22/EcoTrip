<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WishlistExplore extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'explore_id',
    ];

    public function explore() {
        return $this->belongsTo(Explore::class, 'explore_id', 'id');
    }
}
