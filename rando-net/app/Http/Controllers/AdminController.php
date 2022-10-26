<?php

namespace App\Http\Controllers;

use App\Models\Hike;
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
        return view("admin.index", ["hikes" => $hikes]);
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
        return view("admin.review", ["hike" => $hike]);
    }
}
