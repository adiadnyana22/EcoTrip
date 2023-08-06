<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExplorePicture extends Model
{
    use HasFactory;

    protected $fillable = [
        'explore_id',
        'picture',
    ];
}
