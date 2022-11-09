<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hike extends Model
{
    use HasFactory;

    protected $fillable = [
        "name", "region", "coordinates", "difficulty", "map", "description", "submittedBy"
    ];

    function user() {
        return $this->belongsTo(User::class);
    }
}
