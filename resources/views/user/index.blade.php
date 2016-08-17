@extends( 'layouts.admin' )

@section( 'content' )
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-home"></i> <a href="{{url('/')}}"> Ínicio</a>
            </li>
            <li class="active">
                <i class="fa fa-male"></i> Membros
            </li>
        </ol>

        @include('messages.status')

        <br />

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><b>Membros</b></h3>
            </div>
            <div class="panel-body">
                @if( count($users) > 0 )
                    <table class="table table-striped table-bordered">
                        <thead>
                        <th>#</th>
                        <th>Nome</th>
                        <th>email</th>
                        <th>Equipes</th>
                        </thead>

                        <tbody>
                        @foreach($users as $i => $user)
                            <tr>
                                <td>{{$i+1}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td class="inforTeamsUser" data-id="{{$user->id}}" data-name="{{$user->name}}"><a href="#">
                                        <span class="badge">{{count($user->teams)}}</span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <p>Nenhum membro cadastrado até o momento.</p>
                @endif
            </div>
            {!! $users->render() !!}
        </div>
    </div>
 @include('modal.user_teams')
@stop
@section( 'scripts' )
    <script src="{{ url('js/user.js') }}" type="text/javascript"></script>
@stop