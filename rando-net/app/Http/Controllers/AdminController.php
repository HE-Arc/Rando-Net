<?php

namespace App\Http\Controllers;

use App\Models\Hike;
use App\Models\Tag;
use App\Models\User;

class AdminController extends Controller
{
    /**
     * Display all the hikes for the admins
     * Get only the non validated Hikes
     * @return Response
     */
    public function index()
    {
        $hikes = Hike::where("validated", false)->paginate(10);
        return view("admins.index", compact("hikes"))->with(
            "i",
            (request()->input("page", 1) - 1) * 5
        );
    }

    /**
     * Display the form for the review with the chosen hike.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $hike = Hike::findOrFail($id);
        $user = User::where("id", $hike->submittedBy)->firstOrFail();
        $tags = Tag::all();

        return view("admins.review", [
            "hike" => $hike,
            "user" => $user,
            "tags" => $tags,
        ]);
    }
}
