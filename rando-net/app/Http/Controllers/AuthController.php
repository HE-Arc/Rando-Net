<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Authenticate;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

use function PHPUnit\Framework\isEmpty;

class AuthController extends Controller
{

    public function login()
    {
        // if(Auth::user() == null)
        // {
            return view("auth.login");
        // }else
        // {
        //     return redirect()
        //          ->route("hikes.index")
        //          ->with("success", "connected");
        // }
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            "name" => "required|min:5|max:50",
            "password" => "required",
        ]);

        $credential = array(
            'name'  => $request->get('name'),
            'password' => $request->get('password')
           );

        if (Auth::attempt($credential)) {
            //$user = User::where("name", $request->name)->get();
            Auth::loginUsingId($request->name);

            //$request->session()->put('user', $user);
            $request->session()->regenerate();
            return redirect()
                 ->route("hikes.index")
                 ->with("success", "Logged in successfully");
        }else
        {
            return back()->withErrors([
                "name" => "Incorrect Credentials",
           ]);
        }
    }

    public function signin()
    {
        return view("auth.signin");
    }

    public function validateSignin(Request $request)
    {
        $request->validate([
            "name" => "required|min:5|max:50",
            "password" => "required",
            "confirmPassword" => "required",
        ]);
        if($request->password == $request->confirmPassword)
        {
            //Vérifier que le nom est unique
            $existingUser = User::where("name", $request->name)->get();
            if(count($existingUser)===0) //User doesn't existe
            {
                $user = new User();
                $user->name = $request->name;
                $user->password = bcrypt($request->password);
                $user->email = $request->name."@notreal.com";
                $user->isAdmin = 0;
                $user->save();

                //user::validateLogin($request);
                return redirect()
                ->route("login")
                ->with("success", "Signed in successfully");
            }else // A User was found
            {
                return back()->withErrors([
                    "name" => "Already Existing user",
               ]);
            }
        }else{
        return back()->withErrors([
            "name" => "Not the same password",
       ]);
    }
}

    public function logout()
    {
        Auth::logout();
        return redirect()
             ->route("hikes.index")
             ->with("success", "logged out successfully");
    }
}
