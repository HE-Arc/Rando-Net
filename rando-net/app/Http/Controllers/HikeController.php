<?php

namespace App\Http\Controllers;

use App\Models\Hike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HikeController extends Controller
{
    /**
     * Display all the validated Hikes.
     *
     * @return Response
     */
    public function index()
    {
        $hikes = Hike::where("validated", true)->get();
        return view("hikes.index", ["hikes" => $hikes]);
    }

    public function show() //used for debug purpous
    {
        $hikes = Hike::all();

        return view('hikes.index', ['hikes' => $hikes]);
    }
    public function create()
    {
        //See if authors or tags are needed
        return view("hikes.create");
    }

    public function edit(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:5|max:50',
            'region' => 'required|min:5|max:30',
            'coordinates' => 'required|min:15|max:15',
            'difficulty' => 'required|integer|gte:0|lte:5',
            'map' => 'required',
            'description' => 'required',
        ]);
        $hike = Hike::findOrFail($id);

        $hike->name = $request->name;
        $hike->region = $request->region;
        $hike->coordinates = $request->coordinates;
        $hike->difficulty = $request->difficulty;
        $hike->map = $request->map;
        $hike->description = $request->description;
        $hike->validated = True;
        $hike->submittedBy = Auth::user()->id; //TODO
        $hike->update();

        return redirect()->route("admins.index");
    }

    /**
     * Delete the chosen hike from the Database
     *
     * @param  int  $id
     */
    public static function destroy($id)
    {
        $hike = Hike::findOrFail($id);
        $hike->delete();
        return redirect()->route("admins.index");
    }

    /**
     * Determine what action the admin has chosen
     * He can edit and validate the Hike
     * He can delete it and reject it
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $status = "";
        if ($_REQUEST['btnSubmit'] == "validate") {
            HikeController::edit($request, $id);
            $status = "Admin validated hike successfully";
        } else if ($_REQUEST['btnSubmit'] == "reject") {
            HikeController::destroy($id);
            $status = "Hike rejected successfully";
        }
        return redirect()
            ->route("admins.index")
            ->with("success", $status);
    }

    /**
     * Store the Hike in the Database
     *
     * @param  Request  $request
     * @return Response
     */

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
        $hike->submittedBy = Auth::user()->id; //TODO

        $hike->save();

        return redirect()
            ->route("hikes.index")
            ->with("success", "Hike created successfully");
    }
}
