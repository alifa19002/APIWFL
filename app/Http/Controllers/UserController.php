<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = "My Profile";
        $user_id = $request->user()->id;
        $profilUser = User::where('id', $user_id)->first();
        $my_posts = Post::where('user_id', $user_id)->get();
        $my_events = Registration::select('registrations.id', 'registrations.status_bayar',
                    'events.nama', 'events.deskripsi', 'events.tanggal_event')
                    ->join('events', 'events.id', '=', 'registrations.event_id')
                    ->where('user_id', $user_id)->get();
        return response()->json(['profile' => $profilUser,
        'post' => $my_posts, 'events' => $my_events], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, User $user)
    {
        $title = "My Profile";
        $id = $request->user()->id;
        $profilUser = User::where('id', $id)->first();
        $my_posts = Post::where('user_id', $id)->get();
        return response()->json([
            'profile' => $profilUser,
            'post' => $my_posts], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($username)
    {
        $title = "Edit Profile";
        $profilUser = User::where('username', $username)->first();
        // return view('/user/editProfile', compact(['title', 'profilUser']));
        return response()->json([$profilUser], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        if($request->password == null){
            $input = $request->except(['password']);
        }
        else{
            $input = $request->all();
        }
        $user = User::find($id);
        $user = $user->update($input);
        $profilUser = User::where('id', $id)->first();
        if ($user) {
            return response()->json([
                'success' => true,
                'message' => 'Profile updated!',
                'data' => $profilUser
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Profile failed to update!',
            ], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
