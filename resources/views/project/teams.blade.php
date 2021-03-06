@extends( 'layouts.admin' )

@section( 'content' )
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-home"></i> <a href="{{url('/')}}"> Ínicio</a>
            </li>
            <li class="active">
                <i class="fa fa-users"></i> <a href="{{route('projects.index')}}">Projetos</a>
            </li>
            <li class="active">
                <i class="fa fa-hashtag"></i> {{$project->name}}
            </li>
            <li class="active">
                <i class="fa fa-clipboard"></i> Add Equipes
            </li>
        </ol>

        @include('messages.status')

        <div class="panel panel-default">
            <div class="panel-heading">
                <h5 class="panel-title">Adicione ou remova Equipes para <b><a href="{{url('projects/'.$project->id)}}">{{$project->name}}</a></b></h5>
            </div>
            <div class="panel-body">
                @if( count($teams) > 0 )
                    <table class="table table-striped table-bordered">
                        <thead>
                        <th>#</th>
                        <th>Equipe</th>
                        <th>Lider</th>
                        <th>Selecionar</th>
                        </thead>

                        <tbody>
                        @foreach($teams as $i => $team)
                            <tr>
                                <td>{{$i+1}}</td>
                                <td>{{$team->name}}</td>
                                <td>{{$team->user->name}}</td>
                                <td>
                                    <button class="btn btn-xs addRemoverProjectTeam" data-project="{{$project->id}}" data-team="{{$team->id}}">
                                        <div id="{{'statusAddTeam'.$team->id}}">
                                            @if($results[$team->id])
                                                <i class="fa fa-check-circle-o fa-2x" style="color:green"></i>
                                            @else
                                                <i class="fa fa-circle-o fa-2x" aria-hidden="true"></i>
                                            @endif
                                        </div>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <p>Nenhuma Equipe cadastrada até o momento.</p>
                @endif
            </div>
            {!! $teams->render() !!}
        </div>
    </div>

@stop
@section( 'scripts' )
    <script src="{{ url('js/team.js') }}" type="text/javascript"></script>
@stop