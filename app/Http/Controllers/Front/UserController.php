<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    function index()
    {
        return view('front.register');
    }

    function userRegister(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['email', 'unique:users,email'],
            'password' => ['min:4']
        ]);

        $user =  User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'is_admin' => false
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            toast('Welcome', 'success');
            return redirect()
                ->intended('/')
                ->withSuccess('Signed in');
        }
        toast('Login details are not valid', 'error');

        return back();
    }



    function login()
    {
        return view('front.login');
    }

    function loginStore(Request $request)
    {
        $request->validate([
            'email' => ['required'],
            'password' => ['required']
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            toast('Welcome', 'success');
            return redirect()
                ->intended('/')
                ->withSuccess('Signed in');
        }

        return back()->with('message','Email or password wrong!');
    }
    function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect("/");
    }
}
