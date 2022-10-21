<?php

namespace App\Http\Controllers;

use App\Models\Hike;
use Illuminate\Http\Request;

class HikeController extends Controller
{
    public function index()
    {
        $hikes = Hike::all();

        return view('hike.index', ['hikes' => $hikes]);
    }

    public function create()
    {
        //See if authors or tags are needed
        return view("hike.create");
    }

    public function update(Request $request, $id)
    {
        //$hike = Hike::findOrFail($id)->update($request->all());
        $hike = Hike::findOrFail($id);
        $request->validate([
            'name' => 'required|min:5|max:30',
            'region' => 'required|min:5|max:30',
            'coordinates' => 'required|min:15|max:15',
            'difficulty' => 'required|integer|gte:0|lte:5',
            'map' => 'required',
            'description' => 'required',
        ]);

        $hike->name = $request->name;
        $hike->region = $request->region;
        $hike->coordinates = $request->coordinates;
        $hike->difficulty = $request->difficulty;
        $hike->map = $request->map;
        $hike->description = $request->description;
        $hike->validated = True;

        $hike->update();

        return redirect()->route("admin.index");
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:5|max:30',
            'region' => 'required|min:5|max:30',
            'coordinates' => 'required|min:15|max:15',
            'difficulty' => 'required|integer|gte:0|lte:5',
            'map' => 'required',
            'description' => 'required',
        ]);

        $hike = new Hike();
        $hike->name = $request->name;
        $hike->region = $request->region;
        $hike->coordinates = $request->coordinates;
        $hike->difficulty = $request->difficulty;
        $hike->map = $request->map;
        $hike->description = $request->description;
        $hike->validated = False;


        $hike->save();

        return redirect()->route("hike.index"); // ->with("success", "Created successfully");
    }
}
