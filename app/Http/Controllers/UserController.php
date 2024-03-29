<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
            'name' => 'required|string',
            'username' =>'required|string',
            'password' =>'required|confirmed|required_with:password_confirmation',
            'password_confirmation' => 'required|same:password'
        ]);

        $request = $request->except(['token_csrf']);

        $user = User::create($request);
        // var_dump($user);

        if ($user->save()){
            $users = User::all();
            return redirect()->route('admin.user-config', ['user' => $user]);
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

        if($request['password'] == null){
            unset($request['password']);
        } else {
            // dd($request->all());
            $request->validate([
                'name' => 'required|string',
                'username' =>'required|string',
                'password' =>'required|confirmed|required_with:password_confirmation',
                'password_confirmation' => 'required|same:password'
            ]);
        }
        $request = $request->except(['csrf_token']);

        if($user->update($request)){
            $users = User::all();
            return redirect()->route('admin.user-config', ['user' => $users]);
        }
    }

    public function destroy(int $id)
    {
        $user = User::find($id);
        if ($user->delete()){
            $user = User::all();
            return redirect()->route('admin.user-config', ['user' => $user]);
        }
    }

    public function index_login()
    {
        return view('pages.admin.login.index');
    }


    /**
     * login  resource in storage.
     */
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');
        // dd($credentials);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::getProvider()->retrieveByCredentials($credentials);
            Auth::login($user);
            return redirect()->intended('admin')->withSuccess('Signed in');
            // return $request->session();
        }
        return back()->with('message', 'Username atau Password salah!');
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
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
