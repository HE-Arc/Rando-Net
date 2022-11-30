<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Redis;

class AuthController extends Controller
{

    public function login()
    {
        return view("auth.login");
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'name' => 'required|min:5|max:50',
        ]);

        User::validateLogin($request);

        return redirect()
            ->route("hikes.index")
            ->with("success", "Logged in successfully");
    }

    public function signin()
    {
        return view("auth.signin");
    }

    public function validateSignin(Request $request)
    {
        $request->validate([
            'name' => 'required|min:5|max:50',
        ]);
        User::validateSignin($request);

        return redirect()
            ->route("hikes.index")
            ->with("success", "Signin in successfully");
    }
}
