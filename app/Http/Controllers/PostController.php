<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\User;
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
        $id = $_POST['id'];
        $ups = $_POST['ups'];
        return $ups;
        if (auth()->user()->table == 'users') $tipo = 'user_id';
        else $tipo = 'instituicao_id';
        Up_post::create([
            $tipo => auth()->user()->id,
            'post_id' => $id,
            'ups' => $ups,
        ]);


    }
    public function createCategoria(Request $request){
        Categoria::create([
           'nome' => $request->descricao,
        ]);
    }
    public function upCount(){
        $id = $_POST['id'];
        $ups = Up_post::where('post_id',$id)->sum('ups');
        return $ups;
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
    public function show($id)
    {
        $nome = 'asd';
        $comments = Comment::all();
        foreach ($comments as $comment){
            if ($comment->user_id != '') $user = User::find($comment->user_id);
            else $user = User::find($comment->instituicao_id);
            $users[$user->id] = $user->name;
        }
        return view('post', compact('id','nome', 'comments', 'users'));
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
