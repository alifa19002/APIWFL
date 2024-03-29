<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    // public function index()
    // {
    //     return view('register.index', [
    //         'title' => 'Register',
    //         'active' => 'register'
    //     ]);
    // }

    public function store(Request $request)
    {
        // $validatedData = $request->validate([
        //     'nama' => 'required|max:255',
        //     'username' => ['required', 'min:3', 'max:255', 'unique:users'],
        //     'email' => 'required|email:dns|unique:users',
        //     'no_telp' => 'required|numeric|digits_between:10,14',
        //     'jk' => 'required|max:1',
        //     'password' => 'required|min:5|max:255',
        //     'role' => 'required',
        // ]);

        // $validatedData['password'] = bcrypt($validatedData['password']);
        // $validatedData['password'] = Hash::make($validatedData['password']);

        $register = User::create([
            'nama' => $request->input('nama'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'no_telp' => $request->input('no_telp'),
            'password' => $request->input('password'),
            'role' => $request->input('role'),
            'jk' => $request->input('jk')
        ]);
        // $request->session()->flash('success', 'Registration successful, please login!');
        // return redirect('/login')->with('success', 'Registration successful, please login!');
        if ($register) {
            return response()->json([
                'success' => true,
                'message' => 'Registration successful, please login!',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Registration failed, try again!',
            ], 400);
        }
    }
}
