@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="container">
        <form action="" method="post">
                <input type="text" placeholder="Digite a sua denúncia" name="descricao">
                <input type="file" name="imagem" accept="image/*">
                <button type="submit">Postar</button>
        </form>
        
    </div>
    
@stop