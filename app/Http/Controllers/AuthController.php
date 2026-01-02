<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class AuthController extends Controller
{
public function showLogin()
{
return view('login');
}


public function login(Request $request)
{
$credentials = $request->validate([
'email' => 'required|email',
'password' => 'required'
]);


if (Auth::attempt($credentials)) {
$request->session()->regenerate();


if (auth()->user()->role === 'admin') {
return redirect('/admin/dashboard');
}
return redirect('/user/dashboard');
}


return back()->withErrors([
'email' => 'Login gagal'
]);
}


public function logout(Request $request)
{
Auth::logout();
$request->session()->invalidate();
$request->session()->regenerateToken();
return redirect('/login');
}

public function showRegister()
{
    return view('register');
}

public function register(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|confirmed|min:6',
    ]);

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' =>bcrypt($request->password),
        'role' => 'user' // default user
    ]);

    return redirect('/login')->with('success', 'Registrasi berhasil, silakan login');
}

}
