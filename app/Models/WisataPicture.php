<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WisataPicture extends Model
{
    use HasFactory;

    protected $fillable = [
        'wisata_id',
        'picture',
    ];
}
