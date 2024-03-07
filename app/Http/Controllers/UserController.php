<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.login');
    }



    /**
     * Store a newly created resource in storage.
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('pages.admin')->withSuccess('Signed in');
        }
        return back()->withSuccess('Login details are not valid');
    }

    public function reset_password(Request $request)
    {
        $request = validate([
            'email' => 'required',
            'new_password' => 'required',
        ]);

        $user = User::where('email', $request->email)->get();
        if ($user){
            $user->update([
                'password' => $request->password
            ]);

            return redirect()->back();
        }
        return redirect()->back()->withError('user not found');

    }


}
