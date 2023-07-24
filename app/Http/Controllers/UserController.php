<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Session;
use DB;

class UserController extends Controller
{
    public function showSigninSignup()
    {
        return view('signinsignup');
    }
    public function register(Request $request)
    {
        $user = new User;
        $user->first_name = $request->input('reg_first_name');
        $user->last_name = $request->input('reg_last_name');
        $user->email = $request->input('reg_email');
        $password = $request->input('reg_password');
        $user->password = Hash::make($password);
        $user->role = $request->input('reg_role');
        $user->save();

        return back()->with('success', 'New account created!');
    }
    public function login(Request $request)
    {
        $credentials = [
            'email' => $request->login_email,
            'password' => $request->login_pass,
        ];

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            $request->session()->put('id', $user->id);
            $request->session()->put('first_name', $user->first_name);
            $request->session()->put('last_name', $user->last_name);
            $request->session()->put('email', $user->email);
            $request->session()->put('role', $user->role);
            $request->session()->put('logged_in', true);

            if ($user->role === 'admin') {
                return redirect('/admin')->with('success', 'Logged in as admin!');
            } else {
                return redirect()->route('home')->with('success', 'Welcome, ' . $user->first_name . '!');
            }
        } else {
            return back()->with('fail', 'Incorrect email or password');
        }
    }
    public function logout()
    {
        if (Session::has('id')) {
            Session::flush();
        }

        return redirect('signinsignup')->with('success', 'You have been logged out!');
    }


    // ------------------------------ADMIN----------------------------------//
    public function adminHome()
    {
        if (Session::has('id')) {
            $s = User::query()
                ->select(DB::raw('*'))
                ->where("role", "=", Session::get("role"))
                ->get()
                ->first();
            return view('admin_home', compact('s'));
        } else {
            return back()->with('fail', 'Failed to get data');
        }
    }

    public function showUserAccount()
    {
        $user = Auth::user();
        return view('account', compact('user'));
    }

    public function updateUserAccount(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $password = $request->input('pass');
        $user->password = Hash::make($password);
        $user->save();

        return back()->with('success', 'Successfully updated');
    }
}
