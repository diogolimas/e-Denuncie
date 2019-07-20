<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Categoria_post;
use Illuminate\Http\Request;
use DB;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $categoria = Categoria::find($id);
        $posts = DB::table('posts')
            ->join('categoria_posts', 'posts.id', '=', 'categoria_posts.post_id')
            ->select('*')
            ->latest()
            ->where('categoria_id', $id)
            ->paginate(7);
        $imagensPost = DB::table('imagem_posts')->get();
        $usuarios = DB::table('users')->get();
        return view('categoria', compact('categoria','posts', 'imagensPost', 'usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $sucesso = Categoria::create([
           'nome' => $request->nome
        ]);
        if ($sucesso) return redirect()->route('categorias',['success' => 'Categoria criada com sucesso!']);
        else return redirect()->route('categorias',['error' => 'Falha ao criar categoria!']);
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
        //
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
