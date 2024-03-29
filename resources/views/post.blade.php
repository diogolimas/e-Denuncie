@extends('adminlte::page')

@section('title', 'DenuncieAqui')

@section('content_header')
    <!-- <h1>Dashboard</h1> -->
@stop

@section('content')

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
                            <span id="ups_post_{{$post->id}}" >0</span>
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
                            <button data-id_post="{{$post->id}}" id="sUP" class="glyphicon glyphicon-chevron-up glypS glyp" aria-hidden="true"></button>
                            <button data-id_post="{{$post->id}}" id="mUP" class="glyphicon glyphicon-chevron-up glypM glyp glyp-selected" aria-hidden="true"></button>
                            <button data-id_post="{{$post->id}}" id="lUP" class="glyphicon glyphicon-chevron-up glypL glyp" aria-hidden="true"></button>
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

                        <button type="submit" class="btn btn-success">Comentar</button>
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
                        <button data-id_comment="{{$comment->id}}" id="bLike" class="glyphicon glyphicon-thumbs-up glyp-like" title="Gostei" aria-hidden="true"></button>
                        <span id="likes_comment_{{$comment->id}}" >0</span>
                        <button data-id_comment="{{$comment->id}}" id="bDislike" class="glyphicon glyphicon-thumbs-down glyp-dislike" title="Não Gostei" aria-hidden="true"></button>
                    </div>
                </div>
            @endforeach

    </div>
@stop
