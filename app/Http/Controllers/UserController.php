<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('posts','comments')->simplePaginate(15);
        return view('users',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create-user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User;
        $user->name = $request->username;
        $user->age = $request->age;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->birthday = $request->birthday;
        $user->save();

        $profile = new Profile;
        $profile->user_id = $user->id;
        $profile->address = $request->address;
        $profile->tel = $request->tel;
        $profile->province = $request->province;
        $profile->save();

        return redirect('/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {     
        $user = User::find($id)->load('profile','comments');
        // $user->load('profile','comments');
        
        return view('showUserDetail',compact('user'));
    }

    public function showComments($id)
    {
        $comments = User::find($id)->comments;

        return view('comments',compact('comments'));
    }

    public function showPosts($id)
    {
        $posts = User::find($id)->posts;

        return view('posts',compact('posts'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    public function search(Request $request)
    {
        // dd();
        $user = null;
        if ($request->info == 'name'){
            $users = User::where('name','like','%'.$request->value.'%')->get();
        }
        if ($request->info == 'posts'){
            $users = User::withCount('comments','posts')->get();
            $users = $users->filter(function($user) use ($request){
                return $user->posts_count == $request->value;
            });
        }
        if ($request->info == 'comments'){
            $users = User::withCount('comments','posts')->get();
            $users = $users->filter(function($user) use ($request){
                return $user->comments_count == $request->value;
            });
        }
        // dd($users->toArray());
        return view('/users',compact('users'));
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
