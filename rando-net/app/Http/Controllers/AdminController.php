<?php

namespace App\Http\Controllers;

use App\Models\Hike;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $hikes = Hike::all();
        return view('admin.index', ['hikes' => $hikes]);
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
        return view("admin.review", ['hike' => $hike]);
    }



}
