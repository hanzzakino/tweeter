<?php

namespace App\Http\Controllers;

use App\Models\User;
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
            'name' => 'required|min:3',
        ]);

        User::where('id', auth()->user()->id)->update($formData);

        return redirect('/');
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
