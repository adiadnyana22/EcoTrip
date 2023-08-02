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
        'foreign_price',
        'location',
        'description',
        'activity',
        'includes',
    ];
}
