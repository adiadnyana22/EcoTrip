<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'wisata_id',
    ];

    public function wisata() {
        return $this->belongsTo(Wisata::class, 'wisata_id', 'id');
    }
}
