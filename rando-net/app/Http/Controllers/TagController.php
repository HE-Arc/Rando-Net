<?php

namespace App\Http\Controllers;

use App\Models\Hike;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Models\Tags;

class TagController extends Controller
{
    /**
     * Displays tag research input
     *
     * @return Response
     */
    public function index()
    {
        $tags = Tag::all();
        return view("tags.research", ["tags" => $tags]);
    }

    public function show($id)
    {
    }

    /**
     * Used for looking up hikes according to selected tag
     *
     * @param Request $request -> int
     * @return Response Displays view with found hikes
     */
    public function displayHikes(Request $request)
    {
        $request->validate([
            "tag" => "required|exists:tags,id",
        ]);

        //Inner joining hikes and tags
        $hikes = Hike::join("hike_tag", "hikes.id", "=", "hike_tag.hike_id")
            ->join("tags", "tags.id", "=", "hike_tag.tag_id")
            ->where("tags.id", $request->tag)
            ->select(
                "hikes.id",
                "hikes.name",
                "hikes.region",
                "hikes.difficulty"
            )
            ->get();

        if (count($hikes) == 0) {
            return redirect()
                ->route("tags.index")
                ->with("fail", "No hikes where found");
        }
        return view("tags.show", ["hikes" => $hikes]);
    }
}
