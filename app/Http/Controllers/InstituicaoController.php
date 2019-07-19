<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Instituicao;

class InstituicaoController extends Controller
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
        $criar_instituicao = Instituicao::create([
            'nome' => $request->nome,
            'cnpj' => $request->cnpj,
            'sigla' => $request->sigla,
            'login' => $request->login,
            'senha' => Hash::make($request->senha),
        ]);
        if ($criar_instituicao)
            return redirect()->route('home',['success' => 'Instituição criada com sucesso!']);
        else
            return redirect()->route('home',['error' => 'Falha ao criar instituição']);

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
        $instituicao = Instituicao::find($id);
        $table_itens = ['nome', 'cnpj', 'sigla', 'login', 'senha'];
        foreach ($table_itens as $item){
            if (isset($request->item))
                $instituicao->item = $request->item;
        }
        $sucesso = $instituicao->save();
        if ($sucesso)
            return redirect()->route('home',['sucess' => 'Os dados da instituição foram atualizados com sucesso']);
        else
            return redirect()->route('home',['error' => 'Não foi possível atualizar os dados da instituição']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Instituicao::destroy($id);
    }
}
