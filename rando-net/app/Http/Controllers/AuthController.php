<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Display the login page
     *
     * @return Response
     */
    public function login()
    {
        return view("auth.login");
    }

    /**
     * Validate the authetification and connect the user to a session with Auth
     *
     * @param  Request  $request
     * @return Response
     */
    public function authenticate(Request $request)
    {
        $request->validate([
            "name" => "required|min:5|max:50",
            "password" => "required|min:5",
        ]);

        $credential = [
            "name" => $request->get("name"),
            "password" => $request->get("password"),
        ];

        if (Auth::attempt($credential)) {
            Auth::loginUsingId($request->name);

            $request->session()->regenerate();
            return redirect()
                ->route("hikes.index")
                ->with("success", "Logged in successfully");
        } else {
            return back()->withErrors([
                "password" => "Incorrect Credentials",
            ]);
        }
    }

    /**
     * Display the sigin page
     * Create a new account
     *
     * @return Response
     */
    public function signin()
    {
        return view("auth.signin");
    }

    /**
     * Validate the signIn and redirect on the login page
     *
     * @param  Request  $request
     * @return Response
     */
    public function validateSignin(Request $request)
    {
        $request->validate([
            "name" => "required|min:5|max:50",
            "password" => "required|min:5",
            "confirmPassword" => "required|min:5",
        ]);

        //Check that the password are the same
        if ($request->password == $request->confirmPassword) {
            //Check that the name is unique, so that we can't find someone with the same name in the DB
            $existingUser = User::where("name", $request->name)->get();
            if (count($existingUser) === 0) {
                //User doesn't exist yet
                $user = new User();
                $user->name = $request->name;
                $user->password = bcrypt($request->password);
                $user->email = $request->name . "@notreal.com";
                $user->isAdmin = 0;
                $user->save();

                return redirect()
                    ->route("login")
                    ->with("success", "Signed in successfully");
            }
            // A User was found
            else {
                return back()->withErrors([
                    "name" => "Already Existing user",
                ]);
            }
        } else {
            return back()->withErrors([
                "name" => "Not the same passwords",
            ]);
        }
    }

    /**
     * Log out the user and redirect on the index page
     *
     * @return Response
     */
    public function logout()
    {
        Auth::logout();
        return redirect()
            ->route("hikes.index")
            ->with("success", "logged out successfully");
    }
}
