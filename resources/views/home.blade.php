@extends('adminlte::page')

@section('title', 'D! - Página inicial')

@section('content_header')
    <!-- <h1>Dashboard</h1> -->
@stop

@section('content')
    
    @if(isset($success))
        <div class="alert alert-success" role="alert">
            {{$success}}
        </div>
    @endif
    @if(isset($errors) && count($errors) > 0)
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <p>{{$error}}</p>  
            @endforeach
        </div>
    @endif
        
        <div class="posts-container">
            <div class="send-form">
                <form action="{{route('postar.denuncia')}}" method="post" enctype="multipart/form-data">
                    {!!csrf_field()!!}
                    <textarea name="descricao" class="send-form-text" rows="4" placeholder="Digite a sua denúncia"></textarea>
                    <div class="form-group">
                        <label class="label-desc">Descrição da imagem:</label>
                        <input type="text" class="form-control" name="descricaoImagem" id="">
                    </div>
                    <div class="send-form-sends">
                        <span class="btn btn-primary btn-file">
                            <span class="glyphicon glyphicon-picture" aria-hidden="true"></span>
                            <input type="file" name="imagem" accept="image/*">
                        </span>
                        <button type="submit" class="btn btn-success">Postar</button>
                    </div>
                    
                </form>
            </div>

            @if(isset($posts))
                
            @foreach ($posts as $postItem)
            
            <div class="posts">
                <div class="post">
                    <div class="post-header">
                        
                        <p class="post-header-name">
                            @foreach ($usuarios as $usuario)
                                @if($postItem->user_id == $usuario->id)
                                    {{$usuario->name}}
                                @else
                                @endif
                            @endforeach
                        </p>
                        <div class="post-header-ups"><span id="ups_post{{$postItem->id}}" >0</span>UP's</div>
                    </div>
                    @if(isset($imagensPost))
                    @foreach ($imagensPost as $imagem)
                    
                        @if($imagem->post_id == $postItem->id)
                        
                            <div class="post-photo">
                                <img src="{{ url("/storage/posts/{$imagem->arquivo}") }}" alt="{{$postItem->descricao}}">
                            </div>
                             
                        @endif
                        @endforeach
                        
                            <div class="post-footer">
                            <a href="{{route('post.comment', ['id'=>$postItem->id])}}">
                                <div class="post-footer-desc" >
                                    {{$postItem->descricao}}    
                                </div>
                            </a>
                   
                    @else

                    @endif
                        <div class="post-footer-ups">
                            <div class="post-footer-time">
                                {{$postItem->created_at}}
                            </div>
                            <div class="post-footer-up">
                                <button data-id_post="{{$postItem->id}}" id="sUP" class="glyphicon glyphicon-menu-up glypS glyp" aria-hidden="true"></button>
                                <button data-id_post="{{$postItem->id}}" id="mUP" class="glyphicon glyphicon-menu-up glypM glyp" aria-hidden="true"></button>
                                <button data-id_post="{{$postItem->id}}" id="lUP" class="glyphicon glyphicon-menu-up glypL glyp" aria-hidden="true"></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @endforeach
            @else
            @endif
            {{$posts->links()}}


        </div>
    </div>
    
@stop
