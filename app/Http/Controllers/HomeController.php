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
}
