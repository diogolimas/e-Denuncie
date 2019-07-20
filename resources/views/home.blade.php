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

    <div class="flex-grid">
        <div class="side-div">
            <div class="send-form">
                <form action="{{route('postar.denuncia')}}" method="post" enctype="multipart/form-data">
                    {!!csrf_field()!!}
                    <textarea name="descricao" class="send-form-text" rows="4" placeholder="Digite a sua denúncia"></textarea>
                    <div class="categories">
                        <select class="categories-select">
                            <option value="" selected disabled>Selecione a categoria</option>
                            <option disabled>────────────</option>
                            <option value="">Mobilidade urbana</option>
                            <option value="">Serviço de saúde</option>
                            <option value="">Acessibilidade virtual</option>
                            <option value="">Educação</option>
                            <option value="">Segurança</option>
                            <option value="">Outros</option>
                        </select>
                        <input type="text" class="categories-others" placeholder="Outros...">
                    </div>

                    <div class="form-group img-desc none">
                        <label class="label-desc">Descrição da imagem:</label>
                        <input type="text" class="form-control" name="descricaoImagem" id="">
                    </div>
                    <div class="send-form-sends">
                        <div class="dpf">
                            <button type="button" onclick="return null" class="actionBtn fileBtn"><span class="glyphicon glyphicon-picture" aria-hidden="true"></span></button>
                            <button type="button" onclick="return null" class="inputFileText mright none" style="border-radius: 0 5px 5px 0; color: white;"></button>
                            <input type="file" id="fileUpload" name="imagem" class="fileInput" accept="image/*">

                            <button type="button" onclick="return null" class="actionBtn fileRemoveBtn none"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                        </div>

                        <button type="submit" class="btn btn-success">Postar</button>
                    </div>

                </form>
            </div>
        </div>

        <div class="posts-container">
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
                        <div class="post-header-ups">
                            <span>
                                <span id="ups_post{{$postItem->id}}" >0</span>
                                <span class="glyphicon glyphicon-chevron-up post-header-ups-up" aria-hidden="true"></span>
                                <span class="glyphicon glyphicon-option-vertical post-header-option" aria-hidden="true"></span>
                            </span>
                        </div>
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
                                <button data-id_post="{{$postItem->id}}" id="sUP" class="glyphicon glyphicon-chevron-up glypS glyp" aria-hidden="true"></button>
                                <button data-id_post="{{$postItem->id}}" id="mUP" class="glyphicon glyphicon-chevron-up glypM glyp" aria-hidden="true"></button>
                                <button data-id_post="{{$postItem->id}}" id="lUP" class="glyphicon glyphicon-chevron-up glypL glyp" aria-hidden="true"></button>
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
    </div>
    
@stop
