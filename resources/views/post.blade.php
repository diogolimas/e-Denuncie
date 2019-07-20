@extends('adminlte::page')

@section('title', 'DenuncieAqui')

@section('content_header')
    <!-- <h1>Dashboard</h1> -->
    <button class="testee" onclick="getMessage();"></button>
@stop

@section('content')


    <div id='msg'>This message will be replaced using Ajax. 
         Click the button to replace the message.</div>

    <div class="posts-container">
        <div class="posts post-comments">
            <div class="post">
                <div class="post-header">
                    <span class="post-header-span-user">
                        <p class="post-header-name">{{$author_post->name}}</p>
                        <span class="glyphicon glyphicon-user glyp-header-user" title="Dono da publicação" aria-hidden="true"></span>
                    </span>
                    <div class="post-header-ups">
                        <span>
                            <span>98</span>
                            <span class="glyphicon glyphicon-chevron-up post-header-ups-up" aria-hidden="true"></span>
                            <span class="glyphicon glyphicon-option-vertical post-header-option" aria-hidden="true"></span>
                        </span>
                    </div>
                </div>
                <div class="post-photo">
                    @foreach ($imagensPost as $imagem)
                        @if(isset($imagem))
                            <div class="post-photo">
                                <img src="{{ url("/storage/posts/{$imagem->arquivo}") }}" alt="{{$post->descricao}}">
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="post-footer">
                    <div class="post-footer-desc">
                        {{$post->descricao}}
                    </div>
                    <div class="post-footer-ups">
                        <div class="post-footer-time">
                            Hoje, 19:34
                        </div>
                        <div class="post-footer-up">
                            <span class="glyphicon glyphicon-chevron-up glypS glyp" aria-hidden="true"></span>
                            <span class="glyphicon glyphicon-chevron-up glypM glyp" aria-hidden="true"></span>
                            <span class="glyphicon glyphicon-chevron-up glypL glyp" aria-hidden="true"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="post-comment">
            <div class="send-form post-comments-c">

                <form action="{{route('comentar.denuncia')}}" method="post" enctype="multipart/form-data">
                    {!!csrf_field()!!}
                    <input type="hidden" name="post_id" value="{{$id}}">
                    <textarea name="descricao" class="send-form-text" rows="2" placeholder="Digite um comentário"></textarea>
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
        </div>
        <div class="comments">
            <p>Comentários</p>
            @foreach ($comments as $comment)
                <div class="comment">
                    <div class="comment-user">
                        {{$users[$comment->user_id]}}
                        <span class="glyphicon glyphicon-user glyp-owner" title="Dono da publicação" aria-hidden="true"></span>
                    </div>
                    <div class="comment-comment">{{$comment->descricao}}</div>
                    @if(isset($imagensComment))
                        @foreach ($imagensComment as $imagem)
                            @if($imagem->comment_id == $comment->id)
                                <div class="post-photo">
                                    <img src="{{ url("/storage/comments/{$imagem->arquivo}") }}" alt="{{$comment->descricao}}">

                                </div>

                            @endif
                        @endforeach
                    @endif
                    <div class="comment-footer">
                        <span class="glyphicon glyphicon-thumbs-up glyp-like" title="Gostei" aria-hidden="true"></span>
                        <span>122</span>
                        <span class="glyphicon glyphicon-thumbs-down glyp-dislike" title="Não Gostei" aria-hidden="true"></span>
                    </div>
                </div>
            @endforeach

    </div>
@stop
