<?php

namespace App\Http\Controllers;

use App\Models\Hike;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
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
        $hikes = Hike::where("validated", true)->paginate(10);


        return view("hikes.index", compact("hikes"))->with(
            "i",
            (request()->input("page", 1) - 1) * 5
        );
    }

    /**
     * Display a specific hike
     *
     * @param Hike $hike
     * @return Response
     */
    public function show(Hike $hike)
    {
        /**
         * Array used for difficulty display, colors in order: green->cyan->blue->orange->red
         */
        $progressBar = [
            1 => "bg-success",
            2 => "bg-info",
            3 => "",
            4 => "bg-warning",
            5 => "bg-danger",
        ];

        return view("hikes.show", [
            "hike" => $hike,
            "progressBar" => $progressBar,
        ]);
    }

    /**
     * Display all hikes submitted by the connected user
     *
     * @return Response
     */
    public function userHikes()
    {
        $hikes = Hike::where("submittedBy", Auth::user()->id)->paginate(10);
        return view("hikes.user_hikes", compact("hikes"))->with(
            "i",
            (request()->input("page", 1) - 1) * 5
        );
    }

    /**
     * Display the form to create a hike
     *
     * @return Response
     */
    public function create()
    {
        $tags = Tag::all();
        return view("hikes.create", ["tags" => $tags]);
    }

    /**
     * Validate the edition of a hike by a admin user
     *
     * @param  Request  $request
     * @param Integer $id
     * @return Response
     */
    public function edit(Request $request, $id)
    {
        $request->validate([
            "name" => "required|string|min:1|max:50",
            "region" => "required|string|min:1|max:30",
            "coordinates" => "required|min:15|max:15",
            "difficulty" => "required|integer|gte:1|lte:5",
            "tags" => "required|exists:tags,id",
            "description" => "required|string|min:10|max:1000",
        ]);

        $hike = Hike::findOrFail($id);

        $hike->name = $request->name;
        $hike->region = $request->region;
        $hike->coordinates = $request->coordinates;
        $hike->difficulty = $request->difficulty;
        $hike->description = $request->description;
        $hike->validated = true;
        $hike->update();

        //Delete attached Tags to attach new ones, avoids duplicates
        $hike->tags()->detach();
        $tags = Tag::find($request->tags);
        $hike->tags()->attach($tags);

        return redirect()->route("admins.index");
    }

    /**
     * Delete the chosen hike from the Database
     * Detach the tags and delete the images from file system
     *
     * @param  int  $id
     * @return Response
     */
    public static function destroy($id)
    {
        $hike = Hike::findOrFail($id);

        $imagePath = "assets/images/" . $hike->map;

        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }

        //Remove many to many relation before delete
        $hike->tags()->detach();

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
        if ($_REQUEST["btnSubmit"] == "validate") {
            HikeController::edit($request, $id);
            $status = "Admin validated hike successfully";
        } elseif ($_REQUEST["btnSubmit"] == "reject") {
            HikeController::destroy($id);
            $status = "Hike rejected successfully";
        }
        return redirect()
            ->route("admins.index")
            ->with("success", $status);
    }

    /**
     * Store the Hike in the Database
     * Add the image in the file system => "TIME_NAME.extension"
     *
     * Image storage: https://dev.to/shanisingh03/how-to-upload-image-in-laravel-9--4dkf
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|string|min:1|max:50",
            "region" => "required|string|min:1|max:30",
            "coordinates" => "required|min:15|max:15",
            "difficulty" => "required|integer|gte:1|lte:5",
            "image" => "required|image|mimes:png,jpg,jpeg|max:1000000",
            "tags" => "required|exists:tags,id",
            "description" => "required|string|min:10|max:1000",
        ]);

        //create unique name for image before storing it in public storage
        $imageName = time() . "_" . $request->image->getClientOriginalName();
        $request->image->move(public_path("assets/images"), $imageName);

        $hike = new Hike();
        $hike->name = $request->name;
        $hike->region = $request->region;
        $hike->coordinates = $request->coordinates;
        $hike->difficulty = $request->difficulty;
        $hike->map = $imageName;
        $hike->description = $request->description;
        $hike->validated = false;
        $hike->submittedBy = Auth::user()->id;

        $hike->save();

        //Many to many relationship
        $tags = Tag::find($request->tags);
        $hike->tags()->attach($tags);

        return redirect()
            ->route("hikes.index")
            ->with("success", "Hike created successfully");
    }
}
