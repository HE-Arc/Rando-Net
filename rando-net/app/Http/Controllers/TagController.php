<?php

namespace App\Http\Controllers;

use App\Models\Hike;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Models\Tags;

class TagController extends Controller
{
    public function index()
    {
        //FETCH ALL TAGS AND GIVE THEM TO THE VIEW
        $tags = Tag::all();
        return view("tags.research", ['tags' => $tags]);

    }

    public function show($id)
    {

    }

    public function displayHikes(Request $request)
    {
        $request->validate([
            'tag' => 'required',

        ]);
        $hikes= Hike::all();
        return view("tags.show", ['hikes' => $hikes, 'tag' => $request->tag]);

    }

}
