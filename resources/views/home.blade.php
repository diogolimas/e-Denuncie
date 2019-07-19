@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <!-- <h1>Dashboard</h1> -->
@stop

@section('content')
    
    @if(isset($success))
        <div class="alert alert-success" role="alert">
            {{$success}}
        </div>
    @endif
        
        <div class="posts-container">
            <div class="send-form">
                <form action="{{route('postar.denuncia')}}" method="post" enctype="multipart/form-data">
                    {!!csrf_field()!!}
                    <textarea name="descricao" class="send-form-text" rows="4" placeholder="Digite a sua denúncia"></textarea>

                    <div class="send-form-sends">
                        <span class="btn btn-primary btn-file">
                            <span class="glyphicon glyphicon-picture" aria-hidden="true"></span>
                            <input type="file" name="imagem" accept="image/*">
                            <input type="text" name="descricaoImagem" id="">
                        </span>
                        <button type="submit" class="btn btn-success">Postar</button>
                    </div>
                    
                </form>
            </div>

            <div class="posts">
                <div class="post">
                    <div class="post-header">
                        <p class="post-header-name">Daniel Victor</p>
                        <div class="post-header-ups"><span>98 </span>UP's</div>
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
                                <span class="glyphicon glyphicon-menu-up glypS glyp" aria-hidden="true"></span>
                                <span class="glyphicon glyphicon-menu-up glypM glyp" aria-hidden="true"></span>
                                <span class="glyphicon glyphicon-menu-up glypL glyp" aria-hidden="true"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="posts">
                <div class="post">
                    <div class="post-header">
                        <p class="post-header-name">Daniel Victor</p>
                        <div class="post-header-ups"><span>98 </span>UP's</div>
                    </div>
                    <div class="post-photo">
                        <img src="data:image/png;base64,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" alt="...">
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
                                <span class="glyphicon glyphicon-menu-up glypS glyp" aria-hidden="true"></span>
                                <span class="glyphicon glyphicon-menu-up glypM glyp" aria-hidden="true"></span>
                                <span class="glyphicon glyphicon-menu-up glypL glyp" aria-hidden="true"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="posts">
                <div class="post">
                    <div class="post-header">
                        <p class="post-header-name">Daniel Victor</p>
                        <div class="post-header-ups"><span>98 </span>UP's</div>
                    </div>
                    <div class="post-photo">
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAARYAAAC1CAMAAACtbCCJAAAAkFBMVEWstbqrtro2OTmvuL2st72lrbEwMjEpLjBKT1KosLV/hYo4OTurtrywu8FBREiqs7izvb8vMzVZYGOVnaB6gIOepaowMTNCSUxrcHM0NTYpLTAxMTU0ODk3OTdxeXthZGeDjY9SWVw6PkCPl5wkKi5maW18hIVfYGItLS1tdHY0PD9VXF6Kk5aXoKVcZGg6Pj3qV2i/AAAFx0lEQVR4nO3ZbXPaOBcGYEvH8guSbYTBxkQmxGzahDjp//93eyyDgWxmd+aZztO6c18fWmJEGN2jlyMlCAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA5ojo66f09RuzlqaF/5+KNL3v3fAkm34yVGw2dy2EECHRpj8s+jL1yZjxc0v+4MU8A6PFzv6VCmPCfWx3+9tO0MHG8ceUi9lYVt40EILS144fRraq6nXKbThhUtuTneyOs8yFFlbvlChMkDjp7ObmrTSXUtpiarm10rnHu+B6+6C15g9K3b4kNIwWOj48aNleRHONJZIciwmKRHMI62snqI9l65yaHuSula5TdA1qsZPaVTLvZFW5+EAcbpCenIwafVGVc42l3SnDEyLhTjRJEfr1QYhg+Z0fSJdeGh4r+eOHjHoaFxBjRGm1jJLDRqlNuX6qfVy0jqTdb66Kr7/3NzeMlliF51h01Y9riSloUw2xyCmW56Z5frT6OxkxNDAkEueqraDQv03jsKK3VidL8Su68jN9iqV5JOF7HdC+0s1NLGneVv3B6kr5BoEIDrG2q2sC42TJ6nb4Hf/3fvxkd7EkvCaoSywnzqi5xFLQ0bZxoXjdWPhO8+b8xGuRCscEDPPtspxjWf6q3vw0t7FEi/yy6BrR73Td23MswtBj0zxlwVvjkszPGqEqbbd+yg2RFMU4hoZYrpv6bEfNbSz2sLau9o8FPTXNaxmfYylClfM4CWld6b/UGEBf6fg4vhTChH6pLoZY3EcWnvE780zmLpaF4iLGFxqCX9n3KRZBffUjUkZsnLbf/Byh/YOOfUJc3yrectRQ53Is0r2VV39ELLRqmo8hluW6aRJeTy6xBB88e4Y9iJefeoxla3WeimHn3ia50zpfqTEW6eKXUfWwU//67b+t+7Ul619a64PIm+hbdpxGi+JRsia/P0kuhQtu/8HBcV4qsbwwcxauelsKP1pkM7krm2fkUyxp3Q6LLvURF3I0xUIHnjGbYX96d1ytES8iS16Dk8IYNVS1kbVc/5/GWGS+uppnNfcplpD2kcyzIFvJYZu9xvLEc4fPy/yqlq6mYXF9bnQShAVt3WrxropFpJ2PZdiJaOllWfZf3/+buo2lWmRio6UtSek2fqeQ6/0xFrXTdr+kLKNsb3VThkbQq9XdsLYolREZOlTnWCTvRMPmNNdNyPs0icRyZZvn5bdI8sIaHqMxFlrz4Xm19b43utryDizGo/f0e3iaTbHM8nR453MsvPs0XfokeVcKptGSJW44GDRNFPnDcV2YUJQ7XR2mWMSfHYuhXDdb5+9ZLrHQJuZQzvdKFZ8goyMfANJO27drPTvFov/EWARPmJM78UQy51hCw+tJ2zyvz15ta7d8oOQj9VD78WYkhhvNhY8luC/+Z+sfsQSpbdv2pRTTaAmz2rWdyka0dFJ2KR+B3q12vDwHJuTSn8tgjoXnG5+aajFV/2H4qzv4v/nHJCpozwXZR3ATy3ukm1Vm/OZiDO/Ire2JG75yEWy3pUpTtTk+Oj9awjVv1Kv+WB4Z/1POs8wdbuc4Fi5bE39nwFOC+IAThD6WSHMsXMvcLK6Gyl3rHvkgIIKVbWWz62ou/h+4nLMci1EcqouiKhrwAWAxy4WGFlbG6VBnJFzu0+2YN6J8aVwairqRbtqKhSjyZrziDcVr9OCv8KTUTdUdhlM0lSfr9PUud0FzLHSpP3Wd4qJVvOWnw30XRNnldUHvedd9TO8M56IuPw031wXvUdt6F/OgiOvnQ+pv/gNS+6c8z7vc6/pZjpYg9H8S5FiIwk89ECEJGopVbjKVrDzLBAXnH3k/J/VelkqIpRju5zg8E9JVMM9QJuO19adnwl8xfdn2/KIY3g5p+MvB5eMmMOfaX3z5aQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA+O38DQVQaB2oixPQAAAAAElFTkSuQmCC" alt="...">
                    </div>
                    <div class="post-footer">
                        <div class="post-footer-desc">

                        </div>
                        <div class="post-footer-ups">
                            <div class="post-footer-time">
                                Hoje, 19:34
                            </div>
                            <div class="post-footer-up">
                                <span class="glyphicon glyphicon-menu-up glypS glyp" aria-hidden="true"></span>
                                <span class="glyphicon glyphicon-menu-up glypM glyp" aria-hidden="true"></span>
                                <span class="glyphicon glyphicon-menu-up glypL glyp" aria-hidden="true"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="posts">
                <div class="post">
                    <div class="post-header">
                        <p class="post-header-name">Daniel Victor</p>
                        <div class="post-header-ups">
                            <span>98</span>
                            <span class="glyphicon glyphicon-menu-up" aria-hidden="true"></span>
                        </div>
                    </div>
                    <div class="post-photo">
                    </div>
                    <div class="post-footer">
                        <div class="post-footer-desc">
                            aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
                        </div>
                        <div class="post-footer-ups">
                            <div class="post-footer-time">
                                Hoje, 19:34
                            </div>
                            <div class="post-footer-up">
                                <span class="glyphicon glyphicon-menu-up glypS glyp" aria-hidden="true"></span>
                                <span class="glyphicon glyphicon-menu-up glypM glyp" aria-hidden="true"></span>
                                <span class="glyphicon glyphicon-menu-up glypL glyp" aria-hidden="true"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@stop
