<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index', [
            'title' => 'Login',
            'active' => 'login'
        ]);
    }

    public function login(Request $request)
    {   
        $credentials = $request->validate([
                    'email' => 'required|email:dns',
                    'password' => 'required'
                ]);
        if (!Auth::attempt($credentials))
        {
            return response()
                ->json(['message' => 'Unauthorized'], 401);
        }
        $user = User::where('email', $request['email'])->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;
        
        return response()
            ->json(['message' => 'Hi '.$user->nama.', welcome to home','access_token' => $token, 'username' => $user->username, 'role' => $user->role, 'company_id' => $user->company_id, 'id' => $user->id, 'foto_profil' => $user->foto_profil, 'token_type' => 'Bearer', ]);
    }
    public function logout(Request $request)
    {
        $user = $request->user();
        $user->tokens()->where('id', $user->currentAccessToken()->id)->delete();
        return [
            'message' => 'You have successfully logged out and the token was successfully deleted',
        ];
    }
}
