<?php

namespace App\Http\Controllers;

use App\Models\Imagem_comment;
use App\Models\Report_comment;
use App\Models\Like_comment;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Http\Controllers\Auth;
use Intervention\Image\Facades\Image as Image;
use App\User;

class CommentController extends Controller
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
        //if (Auth::getTable() == 'users') $tipo = 'instituicao_id';
        //else $tipo = 'user_id';
        $comentar = Comment::create([
            'descricao' => $request->descricao,
            'post_id' => $request->post_id,
            'user_id' => auth()->user()->id,

        ]);
        $nameFile = '';
        $originalName = '';
        $insertarimagem = null;
        if(isset($request->imagem)){
            
            $originalName = $request->imagem->getClientOriginalName();
            $name = time();
            $extension = $request->imagem->extension();
            $nameFile = "{$name}.{$extension}";
        }
        if(isset($request->imagem)){
            $insertarimagem = Imagem_comment::create([
                'nome'  =>     $originalName,
                'descricao' => $request->descricaoImagem,
                'arquivo'  =>  $nameFile,
                'comment_id'  =>  $comentar->id,
            ]);
        }

        if($comentar) {
            if ($insertarimagem)
                $request->imagem->storeAs('comments', $nameFile);
            return redirect()->back()->with(['success' => 'Comentário publicado com sucesso']);
        }
        else
            return redirect()->back()->with(['error' => 'Erro ao comentar']);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function newReport_comment(Request $request)
    {
        if (auth()->user()->table == 'users') $tipo = 'user_id';
        else $tipo = 'instituicao_id';
        $reportar = Report_comment::create([
            'descricao' => $request->descricao,
            'comment_id' => $request->comment_id,
            $tipo => auth()->user()->id,
        ]);

        if($reportar)
            return redirect()->route('home',['success' => 'Post reportado com sucessso']);
        else
            return redirect()->route('home',['eroor' => 'Erro ao reportar o post']);

    }

    public function likeComment(Request $request, $id){
        $sucesso = Like_comment::create([
            'user_id' => auth()->user()->id,
            'comment_id' => $id,
        ]);

    }

    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  te\Http\Response
     */
    public function show($id)
    {

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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Comment::destroy($id);

    }
}
