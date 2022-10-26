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

    public function show() //used for debug purpous
    {
        $hikes = Hike::all();

        return view('hike.index', ['hikes' => $hikes]);
    }
    public function create()
    {
        //See if authors or tags are needed
        return view("hike.create");
    }

    public function edit(Request $request, $id)
    {
        //$hike = Hike::findOrFail($id)->update($request->all());
        $hike = Hike::findOrFail($id);
        $request->validate([
            'name' => 'required|min:5|max:50',
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

    /**
     * Delete the chosen hike
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public static function destroy($id)
    {
        $hike = Hike::findOrFail($id);
        $hike->delete();
        return redirect()->route("admin.index");
    }


    //l'appel au function destroy et edit ne fonctionne pas...
    public function update(Request $request, $id)
    {

        if ($_REQUEST['btnSubmit'] == "validate") {
            HikeController::edit($request,$id);

        } else if ($_REQUEST['btnSubmit'] == "reject") {
            HikeController::destroy($id);
        }
        return redirect()->route("admin.index");
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:5|max:50',
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
