<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        $post = Post::latest()->limit(5)->get();
        return response()->json([
            'success' => true,
            'message' => 'Page Home',
            'data' => $post
        ], 200);
    }
}
