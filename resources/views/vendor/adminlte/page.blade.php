@extends('adminlte::master')

@section('adminlte_css')
    <link rel="stylesheet"
          href="{{ asset('vendor/adminlte/dist/css/skins/skin-' . config('adminlte.skin', 'blue') . '.min.css')}} ">
    <link rel="stylesheet"
          href="{{ asset('vendor/adminlte/dist/css/skins/style.css')}} ">
    @stack('css')
    @yield('css')
@stop

@section('body_class', 'skin-' . config('adminlte.skin', 'blue') . ' sidebar-mini ' . (config('adminlte.layout') ? [
    'boxed' => 'layout-boxed',
    'fixed' => 'fixed',
    'top-nav' => 'layout-top-nav'
][config('adminlte.layout')] : '') . (config('adminlte.collapse_sidebar') ? ' sidebar-collapse ' : ''))

@section('body')
    <div class="wrapper">

        <!-- Main Header -->
        <header class="main-header">
            @if(config('adminlte.layout') == 'top-nav')
            <nav class="navbar navbar-static-top">
                <div class="container">
                    <div class="navbar-header">
                        <a href="{{ url(config('adminlte.dashboard_url', 'home')) }}" class="navbar-brand">
                            {!! config('adminlte.logo', '<b>Admin</b>LTE') !!}
                        </a>
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                            <i class="fa fa-bars"></i>
                        </button>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                        <ul class="nav navbar-nav">
                            @each('adminlte::partials.menu-item-top-nav', $adminlte->menu(), 'item')
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
            @else
            <!-- Logo -->
            <a href="{{ url(config('adminlte.dashboard_url', 'home')) }}" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini">
                    <img src="{{asset('/img/logo_c_white.png')}}" width="30px" alt="" >
                </span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg">
                <img src="{{asset('/img/logo_f_white.png')}}" width="50px" alt="">
                </span>
            </a>

            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">{{ trans('adminlte::adminlte.toggle_navigation') }}</span>
                </a>
            @endif
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">

                    <ul class="nav navbar-nav">
                        <li>
                            @if(config('adminlte.logout_method') == 'GET' || !config('adminlte.logout_method') && version_compare(\Illuminate\Foundation\Application::VERSION, '5.3.0', '<'))
                                <a href="{{ url(config('adminlte.logout_url', 'auth/logout')) }}">
                                    <i class="fa fa-fw fa-power-off"></i> {{ trans('adminlte::adminlte.log_out') }}
                                </a>
                            @else
                                <a href="#"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                >
                                    <i class="fa fa-fw fa-power-off"></i> {{ trans('adminlte::adminlte.log_out') }}
                                </a>
                                <form id="logout-form" action="{{ url(config('adminlte.logout_url', 'auth/logout')) }}" method="POST" style="display: none;">
                                    @if(config('adminlte.logout_method'))
                                        {{ method_field(config('adminlte.logout_method')) }}
                                    @endif
                                    {{ csrf_field() }}
                                </form>
                            @endif
                        </li>
                    </ul>
                </div>
                @if(config('adminlte.layout') == 'top-nav')
                </div>
                @endif
            </nav>
        </header>

        @if(config('adminlte.layout') != 'top-nav')
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">

            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">

                <!-- Sidebar Menu -->
                <ul class="sidebar-menu" data-widget="tree">
                    @each('adminlte::partials.menu-item', $adminlte->menu(), 'item')
                </ul>
                <!-- /.sidebar-menu -->
            </section>
            <!-- /.sidebar -->
        </aside>
        @endif

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @if(config('adminlte.layout') == 'top-nav')
            <div class="container">
            @endif

            <!-- Content Header (Page header) -->
            <section class="content-header">
                @yield('content_header')
            </section>

            <!-- Main content -->
            <section class="content">

                @yield('content')

            </section>
            <!-- /.content -->
            @if(config('adminlte.layout') == 'top-nav')
            </div>
            <!-- /.container -->
            @endif
        </div>
        <!-- /.content-wrapper -->

    </div>
    <!-- ./wrapper -->
@stop

@section('adminlte_js')
    <script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            }
        });

        // UPS POSTS
        function getUps(id = null){
            return $.post("{{route('api.getups')}}", {id}, function(data){
                let span = 'span#ups_post_'+id;
                switch(data.statusUp){
                    case 0:
                        $(`button#sUP[data-id_post="${id}"]`).removeClass('glyp-selected');
                        $(`button#mUP[data-id_post="${id}"]`).removeClass('glyp-selected');
                        $(`button#lUP[data-id_post="${id}"]`).removeClass('glyp-selected');
                        break;
                    case 1:
                        $(`button#sUP[data-id_post="${id}"]`).addClass('glyp-selected');
                        $(`button#mUP[data-id_post="${id}"]`).removeClass('glyp-selected');
                        $(`button#lUP[data-id_post="${id}"]`).removeClass('glyp-selected');
                        break;
                    case 2:
                        $(`button#sUP[data-id_post="${id}"]`).removeClass('glyp-selected');
                        $(`button#mUP[data-id_post="${id}"]`).addClass('glyp-selected');
                        $(`button#lUP[data-id_post="${id}"]`).removeClass('glyp-selected');
                        break;
                    case 3:
                        $(`button#sUP[data-id_post="${id}"]`).removeClass('glyp-selected');
                        $(`button#mUP[data-id_post="${id}"]`).removeClass('glyp-selected');
                        $(`button#lUP[data-id_post="${id}"]`).addClass('glyp-selected');
                        break;
                    default:
                        break;
                }
                $(span).text(data.ups);
                return data.ups;
            });
        }

        async function setUps(id = null, ups = 0){
            await $.post("{{route('api.setups')}}", {id,ups});
            await getUps(id);
        }

        function reloadUps(){
            if ($('span[id]').length){
                Object.keys($('span[id]')).map(teste=>{
                    if($('span[id]')[teste].attributes && $('span[id]')[teste].attributes.id){
                        let span = $('span[id]')[teste].attributes.id.value;
                        let post_id = span.substr('ups_post_'.length);
                        getUps(post_id);
                    }
                })
            }
        }

        // LIKES COMMENTS
        function getLikes(id = null){
            return $.post("{{route('api.getlikes')}}", {id}, function(data){
                let span = 'span#likes_comment_'+id;
                switch(data.statusLike){
                    case 0:
                        $(`button#bLike[data-id_comment="${id}"]`).removeClass('liked');
                        $(`button#bDislike[data-id_comment="${id}"]`).addClass('disliked');
                        break;
                    case 1:
                        $(`button#bLike[data-id_comment="${id}"]`).addClass('liked');
                        $(`button#bDislike[data-id_comment="${id}"]`).removeClass('disliked');
                        break;
                    case 2:
                        $(`button#bLike[data-id_comment="${id}"]`).removeClass('liked');
                        $(`button#bDislike[data-id_comment="${id}"]`).removeClass('disliked');
                        break;
                    default:
                        break;
                }
                $(span).text(data.total);
                return data.total;
            });
        }

        async function setLikes(id = null, like = false){
            await $.post("{{route('api.setlikes')}}", {id,like});
            await getLikes(id);
        }

        function reloadLikes(){
            if ($('span[id]').length){
                Object.keys($('span[id]')).map(teste=>{
                    if($('span[id]')[teste].attributes && $('span[id]')[teste].attributes.id){
                        let span = $('span[id]')[teste].attributes.id.value;
                        let comment_id = span.substr('likes_comment_'.length);
                        getLikes(comment_id);
                    }
                })
            }
        }

    $(function() {
        reloadUps();
        reloadLikes();

        $('.fileBtn').on('click', function() {
            $('.fileInput').trigger('click');
        });
        
        $('.fileInput').on('change', function() {
            fileName = $(this)[0].files[0].name;
            $('.fileRemoveBtn').removeClass('none');
            $('.inputFileText').removeClass('none');
            $('.fileBtn').addClass('nobrright');
            $('.inputFileText').html(fileName);
            $('.img-desc').removeClass('none');
        });

        $('.fileRemoveBtn').on('click', function() {
            $('.fileInput').val('');
            $('.fileRemoveBtn').addClass('none');
            $('.inputFileText').addClass('none');
            $('.fileBtn').removeClass('nobrright');
            $('.inputFileText').html(fileName);
            $('.img-desc').addClass('none');
        });

        $('button#lUP').click(function(e){
            e.preventDefault();
            
            let idpost = $(this).data('id_post');
            setUps(idpost,3);
        });
        
        $('button#mUP').click(function(e){
            e.preventDefault();
            
            let idpost = $(this).data('id_post');
            setUps(idpost,2);
        });

        $('button#sUP').click(function(e){
            e.preventDefault();
            
            let idpost = $(this).data('id_post');
            setUps(idpost,1);
        });

        $('button#bLike').click(function(e){
            e.preventDefault();
            
            let idcomment = $(this).data('id_comment');
            setLikes(idcomment,1);
        });

        $('button#bDislike').click(function(e){
            e.preventDefault();
            
            let idcomment = $(this).data('id_comment');
            setLikes(idcomment,0);
        });
        
    });

    
    
</script>
    @stack('js')
    @yield('js')
@stop
