@extends( 'layouts.admin' )


@section( 'content' )

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Daily <small>Manager</small>
                </h1>
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-home"></i> Ínicio
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-lg-12">
                <div class="alert alert-info alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <i class="fa fa-info-circle"></i>  <strong>{{ Auth::user()->name }}</strong> Seja Bem-Vindo ao Daily Manager!
                </div>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-lg-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-clipboard"></i> Projetos mais recentes</h3>
                    </div>
                    <div class="panel-body">
                        <div class="list-group">
                            @if( count($projects) > 0 )
                                @foreach($projects as $project)
                                <a href="{{url('app/projects/'.$project->id)}}" class="list-group-item">
                                    <span class="badge"><i class="fa fa-user"></i> {{$project->user->name}}</span>
                                    {{$project->name}}
                                </a>
                                @endforeach
                            @else
                                <a href="" class="list-group-item">
                                    <i class="fa fa-exclamation" aria-hidden="true"></i> Nenhum Projeto cadastrado.
                                </a>
                            @endif
                        </div>
                        <div class="text-right">
                            <a href="{{route('app.projects.index')}}">Ver todos os Projetos <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-users"></i> Equipes mais recentes</h3>
                    </div>
                    <div class="panel-body">
                        <div class="list-group">
                            @if( count($teams) > 0 )
                                @foreach($teams as $team)
                                    <a href="#" class="list-group-item inforUsersTeam" data-id="{{$team->id}}" data-name="{{$team->name}}">
                                        <span class="badge"><i class="fa fa-user"></i> {{$team->user->name}}</span>
                                        {{$team->name}}
                                    </a>
                                @endforeach
                            @else
                                <a href="" class="list-group-item">
                                    <i class="fa fa-exclamation" aria-hidden="true"></i> Nenhuma Equipe cadastrada.
                                </a>
                            @endif
                        </div>
                        <div class="text-right">
                            <a href="{{route('app.teams.index')}}">Ver todos as Equipes <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-male"></i> Membros mais recentes</h3>
                    </div>
                    <div class="panel-body">
                        <div class="list-group">
                            @if( count($users) > 0 )
                                @foreach($users as $user)
                                    <a href="#" class="list-group-item inforTeamsUser" data-id="{{$user->id}}" data-name="{{$user->name}}">
                                        <span class="badge"><i class="fa fa-envelope-o"></i> {{$user->email}}</span>
                                        {{$user->name}}
                                    </a>
                                @endforeach
                            @else
                                <a href="" class="list-group-item">
                                    <i class="fa fa-exclamation" aria-hidden="true"></i> Nenhum usuário cadastrado.
                                </a>
                            @endif
                        </div>
                        <div class="text-right">
                            <a href="{{route('app.users.index')}}">Ver todos os Membros <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
    @include('modal.team_users')
    @include('modal.user_teams')
@stop
@section( 'scripts' )
    <script src="{{ url('js/user.js') }}" type="text/javascript"></script>
    <script src="{{ url('js/team.js') }}" type="text/javascript"></script>
@stop
