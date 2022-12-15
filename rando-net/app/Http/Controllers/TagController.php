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
        print($request->tag);
        /* Crime de guerre
        $tag = $request->tag;
        $hikes_new = array();
        $hikes = Hike::All();
        $i = 0;
        foreach($hikes as $hike)
        {
            foreach($hike->tags as $tag)
            {
                if($tag->name == $request->tag)
                {
                    $hikes_new[$i] = $hike;
                    $i = $i+1;
                }
            }
        }*/
        $hikes = Hike::join('hike_tag', 'hikes.id', '=', 'hike_tag.hike_id')->join('tags', 'tags.id', '=', 'hikes.id')->where('tags.id', $request->tag)->get(); //pas sur s'il faut get
        return view("tags.show", ['hikes' => $hikes]);
    }

}
