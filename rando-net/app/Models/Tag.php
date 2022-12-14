<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    //use \Conner\Tagging\Taggable;
    public $timestamps = false;

    protected $fillable = ['name'];

    function hikes()
    {
        return $this->belongsToMany(Hike::class);
    }
}
