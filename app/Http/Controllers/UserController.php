<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Login;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        // Only allow 'admin' to manage users, others get a 404 page
        $this->middleware(function ($request, $next) {
            $user = Login::find(session('login_user_id'));
            if (!$user || $user->username !== 'admin') {
                abort(404);
            }
            return $next($request);
        });
    }

    public function index()
    {
        $users = Login::all();
        return view('user.index', compact('users'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255|unique:login',
            'password' => 'required|string|min:6',
        ]);

        Login::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('users.index')->with('success', 'User registered successfully.');
    }

    public function edit($id)
    {
        $user = Login::findOrFail($id);
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = Login::findOrFail($id);

        $request->validate([
            'username' => 'required|string|max:255|unique:login,username,' . $id,
            'password' => 'nullable|string|min:6',
        ]);

        $user->username = $request->username;
        
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        $user = Login::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
