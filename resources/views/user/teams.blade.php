@extends( 'layouts.admin' )

@section( 'content' )
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-home"></i> <a href="{{url('/')}}"> Ínicio</a>
            </li>
            <li class="active">
                <i class="fa fa-users"></i> <a href="{{url('/teams')}}"> Equipes</a>
            </li>
            <li class="active">
                <i class="fa fa-user"></i> Minhas Equipes
            </li>
        </ol>

        @include('messages.status')

        <div class="row">
            <div class="col-md-12">
                <a class="btn btn-info" href="{{ route('teams.create') }}" role="button"><i class="fa fa-plus-circle" aria-hidden="true"></i>  Nova Equipe</a>
            </div>
        </div>

        <br />

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><b>Minhas Equipes</b></h3>
            </div>
            <div class="panel-body">
                @if( count($teams) > 0 )
                    <table class="table table-striped table-bordered">
                        <thead>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Lider</th>
                        <th>Membros</th>
                        <th>Projetos</th>
                        <th>Configurações</th>
                        </thead>

                        <tbody>
                        @foreach($teams as $i => $team)
                            <tr id="{{"rowElement".$team->id}}">
                                <td>{{$i+1}}</td>
                                <td>{{$team->name}}</td>
                                <td>{{$team->user->name}}</td>
                                <td class="inforUsersTeam" data-id="{{$team->id}}" data-name="{{$team->name}}"><a href="#">
                                        <span class="badge">{{count($team->members)}}</span>
                                    </a></td>
                                <td class="inforProjectsTeam" data-id="{{$team->id}}" data-name="{{$team->name}}"><a href="#">
                                        <span class="badge">{{count($team->projects)}}</span>
                                    </a></td>
                                <td>
                                    @if($team->user->id == Auth::user()->id)
                                        <a href="{{ url('teams/'.$team->id.'/edit/') }}" class="btn btn-warning btn-xs">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar
                                        </a>
                                        <a class="btn btn-info btn-xs" href="{{url('team/'.$team->id.'/projects')}}">
                                            <i class="fa fa-clipboard" aria-hidden="true"></i> Projetos
                                        </a>
                                        <a class="btn btn-success btn-xs" href="{{url('team/'.$team->id.'/users')}}">
                                            <i class="fa fa-user-plus" aria-hidden="true"></i> Membros
                                        </a>
                                        <button class="btn btn-danger btn-xs deleteButton" data-id="{{$team->id}}" data-name="{{$team->name}}" data-type="Equipe">
                                            <i class="fa fa-trash" aria-hidden="true"></i> Excluir
                                        </button>
                                    @else
                                        <i class="fa fa-lock"></i>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <p>Você não faz parte de nenhuma Equipe até o momento.</p>
                @endif
            </div>
        </div>
    </div>
    @include('modal.team_users')
    @include('modal.team_projects')
@stop
@section( 'scripts' )
    <script src="{{ url('js/team.js') }}" type="text/javascript"></script>
@stop
