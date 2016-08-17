@extends( 'layouts.admin' )

@section( 'content' )
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-home"></i> <a href="{{url('/')}}"> Ínicio</a>
            </li>
            <li class="active">
                <i class="fa fa-users"></i> <a href="{{route('app.teams.index')}}">Equipes</a>
            </li>
            <li class="active">
                <i class="fa fa-hashtag"></i> {{$team->name}}
            </li>
            <li class="active">
                <i class="fa fa-clipboard"></i> Add Projetos
            </li>
        </ol>

        @include('messages.status')

        <div class="panel panel-default">
            <div class="panel-heading">
                <h5 class="panel-title"><b>Clique em selecionar para add Projetos para {{$team->name}}</b></h5>
            </div>
            <div class="panel-body">
                @if( count($projects) > 0 )
                    <table class="table table-striped table-bordered">
                        <thead>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Criador</th>
                        <th>Selecionar</th>
                        </thead>

                        <tbody>
                        @foreach($projects as $i => $project)
                            <tr>
                                <td>{{$i+1}}</td>
                                <td>{{$project->name}}</td>
                                <td>{{$project->user->name}}</td>
                                <td class="addProjectTeam" data-project="{{$project->id}}" data-team="{{$team->id}}">
                                    <div id="{{'statusAdd'.$project->id}}">
                                    @foreach($project->teams as $teamProject)
                                        @if($teamProject->id == $team->id)
                                             <i class="fa fa-check-circle-o fa-2x" style="color:green"></i>

                                        @endif
                                    @endforeach
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <p>Nenhum projeto cadastrado até o momento.</p>
                @endif
            </div>
            {!! $projects->render() !!}
        </div>
    </div>

@stop
@section( 'scripts' )
    <script src="{{ url('js/team.js') }}" type="text/javascript"></script>
@stop