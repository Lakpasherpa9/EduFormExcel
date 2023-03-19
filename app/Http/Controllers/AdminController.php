<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function create()
{
    return view('admincreate');
}
public function store(Request $request)
{
    // Validate the form data
    $validatedData = $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:8|confirmed',
        
    ]);

    // Create a new admin user
    $admin = new User;
    $admin->name = $validatedData['name'];
    $admin->email = $validatedData['email'];
    $admin->password = Hash::make($validatedData['password']);
    $admin->studentid = rand(10000, 99999);
    $admin->role = 1;

    $admin->save();

    // Redirect back to the admin page with a success message
    // return redirect()->route('admin.store')->with('success', 'Admin user created successfully.');
    return back()->with('success', 'Admin user created successfully.');

}
// public function index()
// {
//     $admins = User::where('is_admin', true)->get();

//     return view('admin.index', compact('admins'));
// }
}
