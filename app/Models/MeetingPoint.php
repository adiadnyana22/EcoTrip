<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeetingPoint extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'mapIframe'
    ];

    public function order() {
        return $this->hasMany(OrderExplore::class, 'meeting_point_id', 'id');
    }
}
