<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Imagem_post;
use App\User;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $success = $request->success;
        $posts = DB::table('posts')
                    ->latest()
                    ->paginate(9);
        $imagensPost = DB::table('imagem_posts')->get();
        $usuarios = DB::table('users')->get();
        
        return view('home', compact('success','posts','imagensPost','usuarios'));
    }

    public function myPosts(Request $request)
    {
        $success = $request->success;
        $user_id = auth()->user()->id;
        $posts = DB::table('posts')
                    ->where('user_id',$user_id)
                    ->latest()
                    ->paginate(9);
        $imagensPost = DB::table('imagem_posts')
                          ->join('posts', 'posts.id', '=', 'imagem_posts.post_id')
                          ->where('posts.user_id',$user_id)
                          ->get();
        $usuarios = DB::table('users')
                       ->where('id',$user_id)
                       ->get();
        
        return view('home', compact('success','posts','imagensPost','usuarios'));
    }
}
