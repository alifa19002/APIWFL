<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Report;

class ReportController extends Controller
{
    public function index($id)
    {
        return view('Reports.report', [
            "title" => "Report Posts",
            'posts' => Post::where('id', $id)->first(),
            'message' => NULL
        ]);
    }
    public function store(Request $request)
    {
            Report::create([
                'alasan' => request('alasan'),
                'user_id' => request('user_id'),
                'postingan_id' => request('postingan_id')
            ]);

            return redirect('/posts');
    }
}
