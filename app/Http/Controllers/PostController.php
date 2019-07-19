<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Post;
use App\Models\Imagem_post;
use Intervention\Image\Facades\Image as Image;
use Illuminate\Support\Facades\Response;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $nameFile = '';
        $originalName = '';
        if(isset($request->imagem)){
            $originalName = $request->imagem->getClientOriginalName();
            $name = time();
            $extension = $request->imagem->extension();
            $nameFile = "{$name}.{$extension}";
        }

        
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
        
        $success = "Post criado com sucesso";
        if($insertarpost){
            $add = $request->imagem->storeAs('posts', $nameFile);
            return redirect()->route('home',['success' => 'Post publicado com sucesso']);
        }
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
        return view('post', compact('id','nome'));
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
