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
                <i class="fa fa-male"></i> Add Membros
            </li>
        </ol>

        @include('messages.status')

        <div class="panel panel-default">
            <div class="panel-heading">
                <h5 class="panel-title"><b>Clique em selecionar para add Membros a {{$team->name}}</b></h5>
            </div>
            <div class="panel-body">
                @if( count($users) > 0 )
                    <table class="table table-striped table-bordered">
                        <thead>
                        <th>#</th>
                        <th>Nome</th>
                        <th>email</th>
                        <th>Selecionar</th>
                        </thead>

                        <tbody>
                        @foreach($users as $i => $user)
                            <tr>
                                <td>{{$i+1}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td class="addMemberTeam" data-user="{{$user->id}}" data-team="{{$team->id}}">
                                    <div id="{{'statusAddUser'.$user->id}}">
                                        @foreach($user->teams as $teamUser)
                                            @if($teamUser->id == $team->id)
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
                    <p>Nenhum Membro cadastrado até o momento.</p>
                @endif
            </div>
            {!! $users->render() !!}
        </div>
    </div>

@stop
@section( 'scripts' )
    <script src="{{ url('js/team.js') }}" type="text/javascript"></script>
@stop