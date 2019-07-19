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
                        <p class="post-header-name">Daniel Victor</p>
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
                </div>
                <div class="post-footer">
                    <div class="post-footer-desc">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vehicula nisl egestas pretium congue. Vivamus hendrerit orci enim, nec euismod augue cursus ut. Proin quis ornare metus. Donec facilisis viverra dolor sed porttitor. Maecenas et turpis molestie arcu rutrum euismod.
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
                <form action="" method="post">
                    {!!csrf_field()!!}
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
            <div class="comment">
                <div class="comment-user">
                    Daniel Victor
                    <span class="glyphicon glyphicon-user glyp-owner" title="Dono da publicação" aria-hidden="true"></span>
                </div>
                <div class="comment-comment">É verdade, eu sofri com esse buraco recentemente e é muito importante a solução dele para evitar outros problemas maiores</div>
                <div class="comment-footer">
                    <span class="glyphicon glyphicon-thumbs-up glyp-like" title="Gostei" aria-hidden="true"></span>
                    <span>122</span>
                    <span class="glyphicon glyphicon-thumbs-down glyp-dislike" title="Não Gostei" aria-hidden="true"></span>
                </div>
            </div>

            <div class="comment">
                <div class="comment-user">Alan Sol</div>
                <div class="comment-comment">Sim sim, concordo plenamente.</div>
                <div class="comment-footer">
                    <span class="glyphicon glyphicon-thumbs-up glyp-like" title="Gostei" aria-hidden="true"></span>
                    <span>32</span>
                    <span class="glyphicon glyphicon-thumbs-down glyp-dislike" title="Não Gostei" aria-hidden="true"></span>
                </div>
            </div>

            <div class="comment ">
                <div class="comment-user"> 
                    CAERN
                    <span class="glyphicon glyphicon-star glyp-oficial" title="Instituição" aria-hidden="true"></span>
                </div>
                <div class="comment-comment">Problema Resolvido.</div>
                <div class="comment-footer">
                    <span class="glyphicon glyphicon-thumbs-up glyp-like" title="Gostei" aria-hidden="true"></span>
                    <span>442</span>
                    <span class="glyphicon glyphicon-thumbs-down glyp-dislike" title="Não Gostei" aria-hidden="true"></span>
                </div>
            </div>
        </div>
    </div>

@stop