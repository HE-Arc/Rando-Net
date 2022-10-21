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

    public function review($id)
    {
        $hike = Hike::findOrFail($id);
        return view("admin.review", ['hike' => $hike]);
    }

}
