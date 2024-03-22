<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $user = User::all();
        return view('pages.admin.user_config.index', ['user' => $user]);
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' =>'required',
            'password' =>'required|confirmed|required_with:password_confirmation',
            'password_confirmation' => 'required|same:password'
        ]);

        $request = $request->except(['token_csrf']);

        $user = User::create($request);
        $users = User::all();

        if ($user->save()){
            return redirect()->route('pages.admin.user_config.index', ['user' => $users]);
        }
    }

    public function edit(int $id)
    {
        $user = User::find($id);

        return view('admin.user.edit', ['user' => $user]);
    }

    public function update(Request $request, int $id)
    {
        $user = User::find($id);

        $request = $request->except(['csrf_token']);
        $users = User::all();

        if($user->update($request)){
            return redirect->route('admin.user.index', ['user' => $users]);
        }
    }

    public function delete(int $id)
    {
        $user = User::find($id);
        if ($user->delete()){
            return redirect->route('admin.user.index');
        }
    }

    public function index_login()
    {
        return view('pages.login');
    }


    /**
     * login  resource in storage.
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
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
