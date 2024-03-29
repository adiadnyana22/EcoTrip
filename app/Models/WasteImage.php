<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WasteImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'waste_id',
        'image',
    ];

    public function waste() {
        return $this->belongsTo(Waste::class, 'waste_id', 'id');
    }
}
