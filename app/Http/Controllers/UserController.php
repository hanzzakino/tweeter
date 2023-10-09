<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Tweets;
use App\Models\UserFollows;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function register()
    {
        return view('user.register');
    }

    public function login()
    {
        return view('user.login');
    }

    public function create(Request $request)
    {

        $formData = $request->validate([
            'name' => 'required|min:3',
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6'
        ]);

        $formData['password'] = bcrypt($formData['password']);

        $user = User::create($formData);

        auth()->login($user);

        return redirect('/user/login');
    }

    public function update(Request $request)
    {

        $formData = $request->validate([
            'password' => 'required|confirmed',
        ]);

        $formData['password'] = bcrypt($formData['password']);

        User::where('id', auth()->user()->id)->update($formData);

        return redirect('/')->with('success', 'Password Updated Succesfully!');
    }

    public function edit()
    {
        return view('user.edit');
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/user/login');
    }

    // public function like(Tweets $tweet)
    // {
    //     $tweet->delete();
    //     return back()->with('success', 'Tweet Deleted');
    // }

    public function authenticate(Request $request)
    {
        $formData = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if (auth()->attempt($formData)) {
            $request->session()->regenerate();
            return redirect('/');
        }

        return back()->with('message', 'Wrong Credentials');
    }
}
