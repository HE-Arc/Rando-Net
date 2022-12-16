<?php

namespace App\Http\Controllers;

use App\Models\Hike;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display all the hikes for the admins
     * Get only the non validated Hikes
     * @return Response
     */
    public function index()
    {
        $hikes = Hike::where("validated", false)->get();
        return view("admins.index", ["hikes" => $hikes]);
    }

    /**
     * Display the form with the chosen hike.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $hike = Hike::findOrFail($id);
        $user = User::where("id", $hike->submittedBy)->get();
        $tags = Tag::all();

        return view("admins.review", ['hike' => $hike, 'user' => $user[0], 'tags' => $tags]);
    }
}
