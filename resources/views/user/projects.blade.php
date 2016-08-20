@extends( 'layouts.admin' )

@section( 'content' )
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-home"></i> <a href="{{url('/')}}"> Ínicio</a>
            </li>
            <li class="active">
                <i class="fa fa-clipboard"></i> <a href="{{url('/projects')}}"> Projetos</a>
            </li>
            <li class="active">
                <i class="fa fa-clipboard"></i> Meus Projetos
            </li>
        </ol>

        @include('messages.status')

        <div class="row">
            <div class="col-md-12">
                <a class="btn btn-info" href="{{ route('projects.create') }}" role="button"><i class="fa fa-plus-circle" aria-hidden="true"></i>  Novo Projeto</a>
            </div>
        </div>

        <br />

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><b>Projetos</b></h3>
            </div>
            <div class="panel-body">
                @if( count($projects) > 0 )
                    <table class="table table-striped table-bordered">
                        <thead>
                        <th>#</th>
                        <th>Projeto</th>
                        <th>Criador</th>
                        <th>Equipes</th>
                        <th>Configurações</th>
                        </thead>

                        <tbody>
                        @foreach($projects as $i => $project)
                            <tr id="{{"rowElement".$team->id}}">
                                <td>{{$i+1}}</td>
                                <td><a href="{{url('projects/'.$project->id)}}">{{$project->name}}</a></td>
                                <td>{{$project->user->name}}</td>
                                <td class="inforTeamsProject"  data-id="{{$project->id}}" data-name="{{$project->name}}"><a href="#">
                                        <span class="badge">{{count($project->teams)}}</span>
                                    </a></td>
                                <td>@if($project->user->id == Auth::user()->id)
                                        <a href="{{ url('projects/'.$project->id.'/edit/') }}" class="btn btn-warning btn-xs">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar
                                        </a>
                                        <a class="btn btn-info btn-xs" href="{{url('project/'.$project->id.'/teams')}}">
                                            <i class="fa fa-users" aria-hidden="true"></i> Equipes
                                        </a>
                                        <button class="btn btn-danger btn-xs deleteButton" data-id="{{$project->id}}" data-name="{{$project->name}}" data-type="Projeto">
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
                    <p>Você não participa de nenhum <b>Projeto</b> até o momento.<br> Para fazer parte de um <b>Projeto</b>, você deve fazer parte de uma <b>Equipe</b> desse <b>Projeto</b></p>
                @endif
            </div>
        </div>
    </div>
    @include('modal.project_teams')
@stop
@section( 'scripts' )
    <script src="{{ url('js/project.js') }}" type="text/javascript"></script>
@stop
