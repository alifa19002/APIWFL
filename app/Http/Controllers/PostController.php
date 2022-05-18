<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('Posts.posts', [
        //     "title" => "Sharing",
        //     'posts' => Post::latest()->filter(request(['search']))->paginate(10)->withQueryString()
        // ]);
        $posts = Post::select('posts.id', 'posts.user_id', 'posts.judul', 'posts.deskripsi', 'posts.created_at', 'posts.updated_at', 'users.nama', 'users.foto_profil')
        ->join('users', 'users.id', '=', 'posts.user_id')
        ->orderBy('posts.created_at', 'DESC')
        ->filter(request(['search']))->paginate(10)->withQueryString();
        return response()->json($posts, 200);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.upload', [
            "title" => "Upload Posts",
            'message' => NULL
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = Post::create([
                'judul' => $request->input('judul'),
                'deskripsi' => $request->input('deskripsi'),
                'user_id' => $request->input('user_id')
            ]);

            // return redirect('/uploadpost')->with('success', 'Postingan diunggah.');
            if ($post) {
                return response()->json([
                    'success' => true,
                    'message' => 'Post Berhasil Disimpan!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Post Gagal Disimpan!',
                ], 400);
            }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return view('Posts.view', [
        //     'title' => 'Detail Post',
        //     'active' => 'post',
        //     'post' => $post,
        //     'latest_post' => Post::latest()->get(),
        // ]);
        $post = Post::whereId($id)->first();

        if ($post) {
            return response()->json([
                'success' => true,
                'message' => 'Detail Post',
                'data'    => $post
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Postingan Tidak Ditemukan!',
                'data'    => ''
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('posts.editPost', [
            'title' => 'Edit Post',
            'posts' => Post::where('id', $id)->first()
            // 'posts' => $posts
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $rules = [
            // 'judul' => 'required|max:255',
            // 'deskripsi' => 'required',
            // 'user_id' => 'required'
        ];
        $validatedData = $request->validate($rules);
        $validatedData["user_id"] = auth()->user()->id;

        $post = Post::where('id', $post->id)->update($validatedData);
        if ($post) {
            return response()->json([
                'success' => true,
                'message' => 'Post Berhasil Diupdate!',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Post Gagal Diupdate!',
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        // Post::destroy($post->id);
        // return redirect('/posts')->with('success', 'Post has been deleted!');
        $post = Post::destroy($post->id);
        if ($post) {
            return response()->json([
                'success' => true,
                'message' => 'Post has been deleted!',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Delete Post has been failed!',
            ], 500);
        }
    }
}
