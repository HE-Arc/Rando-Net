<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

use function PHPSTORM_META\type;

class Hike extends Model
{
    use HasFactory;

    protected $fillable = [
        "name", "region", "coordinates", "difficulty", "map", "description"
    ];

}
