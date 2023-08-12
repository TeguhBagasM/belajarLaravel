<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('admin/user', ['userList' => $user]);
    }

    public function show($id)
    {
        $user  = User::with('role')
            ->findOrFail($id);
        return view('admin/user-detail', ['userShow' => $user]);
    }

    public function create()
    {
        $user = Role::select('id', 'name')->get();
        return view('admin/user-add', ['user' => $user]);
    }

    function store(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => $request->role_id,
            'password' => Hash::make($request->password),
        ]);
        if ($user) {
            Session::flash('status1', 'success');
            Session::flash('message1', 'Add New User Success');
        }
        return redirect('user');
    }
}
