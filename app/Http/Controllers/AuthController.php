<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\RedirectResponse;

class AuthController extends Controller
{
    function index()
    {
        if ($user = Auth::user()) {
            if ($user->role_id == '1') {
                return redirect()->intended('/');
            } elseif ($user->role_id == '2') {
                return redirect()->intended('/teacher');
            }
        }
        return view('/login');
    }
    // public function index()
    // {
    //     return view('login');
    // }
    // public function loginStudent()
    // {
    //     return view('login-student');
    // }
    // function authenticating(Request $request)
    // {
    //     $credentials = $request->validate([
    //         'email' => ['required', 'email'],
    //         'password' => ['required'],
    //     ]);

    //     if (Auth::attempt($credentials)) {
    //         $request->session()->regenerate();

    //         return redirect()->intended('/');
    //     }

    //     Session::flash('statusLog', 'failed');
    //     Session::flash('messageLog', 'Login Failed');

    //     return redirect('/login');
    // }

    //multiuser :
    public function authenticating(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();
            if ($user->role_id == '1') {
                return redirect()->intended('/');
            } elseif ($user->role_id == '2') {
                return redirect()->intended('/dashboard-teacher');
            }
        }

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        Session::flash('statusLog', 'failed');
        Session::flash('messageLog', 'Login Failed');

        return redirect('/login');
    }
    // public function authenticatingStudent(Request $request)
    // {
    //     $credentials = $request->validate([
    //         'email' => ['required', 'email'],
    //         'password' => ['required'],
    //     ]);

    //     if (Auth::attempt($credentials)) {
    //         $request->session()->regenerate();

    //         return redirect()->intended('/profile');
    //     }

    //     Session::flash('statusLog', 'failed');
    //     Session::flash('messageLog', 'Login Failed');

    //     return redirect('/login-student');
    // }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        Session::flash('statusOut', 'success');
        Session::flash('messageOut', 'Logout Success');
        return redirect('/login');
    }
}
