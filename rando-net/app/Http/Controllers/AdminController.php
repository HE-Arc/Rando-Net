<?php

namespace App\Http\Controllers;

use App\Models\Hike;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $hikes = Hike::where('validated', "==", "0")->get();
        return view('admins.index', ['hikes' => $hikes]);
    }

    /**
     * Display the form with the chosen hike.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hike = Hike::findOrFail($id);
        return view("admins.review", ['hike' => $hike]);
    }



}
