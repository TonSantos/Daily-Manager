<!DOCTYPE html>
<html>
    <head>
        <title>Daily Manager</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <!-- Bootstrap CSS -->
        <link href="{{ url('css/app.css') }}" rel="stylesheet" type="text/css" />
        
        <!-- Custom CSS -->
        <link href="{{ url('css/sb-admin.css') }}" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="{{ url('css/plugins/morris.css') }}" rel="stylesheet">
        
        <!-- Font Awesome -->
        <link href="{{ url('css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- Bootstrap File Input -->
        <link href="{{ url('css/fileinput.min.css') }}" rel="stylesheet" type="text/css" />

        
    </head>
    
    <body>
       
       <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url('/') }}">Daily Manager</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{ Auth::user()->name }} <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li class="divider"></li>
                        <li>
                            <a href="{{ url('/auth/logout') }}"><i class="fa fa-fw fa-power-off"></i> Sair</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="one item-menu">
                        <a href="{{ url('/') }}"><i class="fa fa-fw fa-home"></i> Ínicio</a>
                    </li>
                    <li class="item-menu">
                        <a href="{{ route('users.index') }}"><i class="fa fa-fw fa-male"></i> Membros</a>
                    </li>
                    <li class="item-menu">
                        <a href="javascript:;" data-toggle="collapse" data-target="#team"><i class="fa fa-fw fa-users"></i> Equipes <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="team" class="collapse">
                            <li>
                                <a href="{{ url('users/'.Auth::user()->id.'/teams') }}">Minhas Equipes</a>
                            </li>
                            <li>
                                <a href="{{ route('teams.index') }}">Todos</a>
                            </li>
                            <li>
                                <a href="{{ route('teams.create') }}">Criar</a>
                            </li>
                        </ul>
                    </li>
                    <li class="item-menu">
                        <a href="javascript:;" data-toggle="collapse" data-target="#project"><i class="fa fa-clipboard"></i> Projetos <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="project" class="collapse">
                            <li>
                                <a href="{{ url('users/'.Auth::user()->id.'/projects') }}">Meus Projetos</a>
                            </li>
                            <li>
                                <a href="{{ route('projects.index') }}">Todos</a>
                            </li>
                            <li>
                                <a href="{{ route('projects.create') }}">Criar</a>
                            </li>
                        </ul>
                    </li>
                    <li class="item-menu" data-toggle="modal" data-target="#modalAbout">
                        <a href="#"><i class="fa fa-fw fa-info-circle"></i> Sobre</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            @yield( 'content' )
            @include('modal.about')
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->


    <!--Javascript's-->
    
    <!-- jQuery -->
    <script type="text/javascript" src="{{ url('js/jquery.min.js') }}"></script>
    
    <!-- Bootstrap -->
    <script type="text/javascript" src="{{ url('js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{url('js/app.js')}}" ></script>
    
    @yield( 'scripts' )
    
    <script type="text/javascript">

        $(".one").addClass('active');

        $(".item-menu").on('click', function() {
             $(this).addClass('active');
         });

    </script>

    </body>
</html>
