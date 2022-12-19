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

    /**
     * Modify the hike locally
     *
     * @param Hike $this
     * @param Request
     * @param bool
     */

    function modify(Request $req, bool $validate)
    {
        $this->name = $req->name;
        $this->region = $req->region;
        $this->coordinates = $req->coordinates;
        $this->difficulty = $req->difficulty;
        $this->map = $req->map;
        $this->description = $req->description;
        $this->validated = $validate;
    }

    /**
     * Create the validator for the forms
     *
     * @return Array
     */
    public function request_validator()
    {
        $req = [
            'name' => 'required|min:5|max:50',
            'region' => 'required|min:5|max:30',
            'coordinates' => 'required|min:15|max:15',
            'difficulty' => 'required|integer|gte:0|lte:5',
            'map' => 'required',
            'description' => 'required',
        ];
        return $req;
    }
}
