<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\User;
use DB;
use App\Models\Post;
use App\Models\Up_post;
use App\Models\Imagem_post;
use App\Models\Categoria;
use Intervention\Image\Facades\Image as Image;
use Illuminate\Support\Facades\Response;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $msg = "this is";
        return response()->json(array('msg'=>$msg), 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Post $post)
    {
        $nameFile = '';
        $originalName = '';
        if(isset($request->imagem)) {
            $originalName = $request->imagem->getClientOriginalName();
            $name = time();
            $extension = $request->imagem->extension();
            $nameFile = "{$name}.{$extension}";
        }

        $this->validate($request, $post->rules);

        $insertarpost = Post::create([
            'descricao' => $request->descricao,
            'user_id'   => auth()->user()->id,
        ]);

        if(isset($request->imagem)){
            $insertarimagem = Imagem_post::create([
                'nome'  =>     $originalName,
                'descricao' => $request->descricaoImagem,
                'arquivo'  =>  $nameFile,
                'post_id'  =>  $insertarpost->id,
            ]);
        }

        if($insertarpost){
            if(isset($request->imagem)){
                $add = $request->imagem->storeAs('posts', $nameFile);

                return redirect()->route('home',['success' => 'Post publicado com sucesso']);
            }else{
                return redirect()->route('home',['success' => 'Post publicado com sucesso']);
            }
        }
    }
    public function upPost(){
        $post_id = $_POST['id'];
        $ups = $_POST['ups'];
        $user_id = auth()->user()->id;
        if(!Up_post::where('user_id',$user_id)->where('post_id',$post_id)->count()){
            Up_post::create([
                'user_id' => $user_id,
                'post_id' => $post_id,
                'ups' => $ups,
            ]);
        } else {
            $id = Up_post::where('user_id',$user_id)->where('post_id',$post_id)->get()[0];
            $objeto = Up_post::find($id->id);
            if($objeto->ups == $ups)
                $objeto->ups = 0;
            else
                $objeto->ups = $ups;
            $objeto->save();
        }
    }

    public function upCount(){
        $id = $_POST['id'];
        $user_id = auth()->user()->id;
        $statusUp = 0;
        $ups = Up_post::where('post_id',$id)->sum('ups');
        if(Up_post::where('user_id',$user_id)->where('post_id',$id)->count()){
            $post = Up_post::where('user_id',$user_id)->where('post_id',$id)->get()[0];
            $statusUp = $post->ups;
        }
        return ['ups'=>$ups,'statusUp'=>$statusUp];
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        //Coisas do post
        $post = Post::find($id);
        $author_post = User::find($post->user_id);
        $success = $request->success;
        $nome = 'asd';
        $comments = DB::table('comments')->where('post_id',$id)->latest()->get();
        $users = null;
        $imagensPost = DB::table('imagem_posts')->get();
        $imagemPost = null;
        foreach ($imagensPost as $imagem){
            if ($imagem->post_id = $id)
                $imagemPost[$imagem->id] = $imagem;
        }
        //Coisas dos comentários
        $imagensComment = DB::table('imagem_comments')->get();
        foreach ($comments as $comment){
            $user = User::find($comment->user_id);
            $users[$user->id] = $user->name;
        }
        return view('post', compact('id','nome', 'comments', 'users','imagensComment','success', 'post','author_post', 'imagensPost'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
