<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        return view('index', [
            'title' => 'Home',
            'active' => 'home',
            'latest_posts' => Post::latest()->limit(5)->get()
        ]);
    }
}
