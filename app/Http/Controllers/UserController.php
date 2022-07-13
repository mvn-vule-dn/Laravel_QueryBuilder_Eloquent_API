<?php

namespace App\Http\Controllers;

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
        $users = DB::table('users')->get();
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
        // dd($request->toArray());
        $id = DB::table('users')->insertGetId([
            'name' => $request->username,
            'age' => $request->age,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'birthday' => $request->birthday,
        ]);

        DB::table('profiles')->insert([
            'user_id' => $id,
            'address' => $request->address,
            'tel' => $request->tel,
            'province' => $request->province
        ]);
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
        $user = DB::table('users')
                ->where('id', '=', $id)
                ->get();
        $user = $user[0];

        $profile = DB::table('users')
                    ->join('profiles', 'profiles.user_id', '=', 'users.id')
                    ->where('profiles.user_id', '=', $user->id)
                    ->select('profiles.*','users.name','users.age','users.avatar')
                    ->get();
        $profile = $profile[0];

        $comments = DB::table('users')
                    ->join('comments', 'users.id', '=', 'comments.user_id')
                    ->where('comments.user_id', '=', $user->id)
                    ->select('comments.*')
                    ->get();

        $posts = DB::table('users')
                    ->join('posts', 'users.id', '=', 'posts.user_id')
                    ->where('posts.user_id', '=', $user->id)
                    ->select('posts.*')
                    ->get();

        return view('showUserDetail',compact('profile','comments','posts'));
    }

    public function showComments($id)
    {
        $user = DB::table('users')
                ->where('id', '=', $id)
                ->get();
        $user = $user[0];
        $comments = DB::table('users')
                    ->join('comments', 'users.id', '=', 'comments.user_id')
                    ->where('comments.user_id', '=', $user->id)
                    ->select('comments.*')
                    ->get();
        return view('comments',compact('comments'));
    }

    public function showPosts($id){
        $user = DB::table('users')
                ->where('id', '=', $id)
                ->get();
        $user = $user[0];
        $posts = DB::table('users')
                    ->join('posts', 'users.id', '=', 'posts.user_id')
                    ->where('posts.user_id', '=', $user->id)
                    ->select('posts.*')
                    ->get();
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
