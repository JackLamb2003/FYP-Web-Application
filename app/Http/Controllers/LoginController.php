<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    function index()
    {
        return view('login.login');
    }

    function registration()
    {
        return view('login.registration');
    }

    function login(Request $request)
    {
        $userDetails = ["email" => $request->email,"password" => $request->password];

        if (Auth::attempt($userDetails)) {
            $request->session()->regenerate();
            return redirect('/drivers/home');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/drivers/home');
    }

    function store_registration(Request $request)
    {
        $user = new User();

        $request->validate([
            'name' => 'required', 'max:255',
            'email' => 'required', 'max:255',
            'password' => 'required', 'unique:posts', 'max:30'
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->role_id = $request->role_id;
        $user->save();
        return redirect('/login');
    }

    public function password_reset()
    {
        return view('login.password');
    }

    public function update_password(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        $request->validate([
            'email' => 'required|email|exists:users,email',
            'current_password' => 'required',
            'new_password' => 'required|min:8',
        ]);

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'The current password is incorrect.']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect('/login')->with('status', 'You have reset your password');
    }

    public function profile()
    {
        $user = Auth::user();
        $drivers = $user->driverChoice;
        $favoriteTrack = $user->favoriteTrack;
        return view('login.profile', compact('user', 'drivers', 'favoriteTrack'));
    }
}
