@extends( 'layouts.admin' )

@section( 'content' )
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-home"></i> <a href="{{url('/')}}"> Ínicio</a>
            </li>
            <li class="active">
                <i class="fa fa-clipboard"></i> <a href="{{route('app.projects.index')}}"> Projetos</a>
            </li>
            <li class="active">
                <i class="fa fa-hashtag"></i> {{$project->name}}
            </li>
        </ol>




        <br />
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><b>Equipes do Projeto</b></h3>
            </div>
            <div class="panel-body">
                @if( count($project->teams) > 0 )
                    <table class="table table-striped table-bordered">
                        <thead>
                        <th>Nome</th>
                        <th>Lider</th>
                        <th>Membros</th>
                        </thead>

                        <tbody>
                        @foreach($project->teams as $team)
                            <tr>
                                <td>{{$team->name}}</td>
                                <td>{{$team->user->name}}</td>
                                <td class="inforUsersTeam" data-id="{{$team->id}}" data-name="{{$team->name}}"><a href="#">
                                        <span class="badge">{{count($team->members)}}</span>
                                    </a></td>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <p>Nenhuma equipe cadastrada nesse Projeto.</p>
                @endif
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><b>Daily do Projeto</b></h3>
            </div>
            <div class="panel-body">
                @include('messages.status')
                @if($status > 0)
                <div class="col-lg-4">
                    <!-- DONE -->
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            Feito Ontem
                        </div>
                        <div class="panel-body">
                            @foreach($project->lists as $item)
                                @if($item->type == DONE)
                                    <div class="alert alert-success alert-dismissable">
                                        @if($item->user->id == Auth::user()->id)
                                            <button type="button" class="close removeItemList" data-dismiss="alert" aria-hidden="true" data-id="{{$item->id}}">×</button>
                                        @endif
                                       {{$item->description}}
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <div class="panel-footer">
                            <button class="btn btn-success btn-xs addItemList"  data-project="{{$project->id}}" data-type="{{DONE}}"> <i class="fa fa-plus-circle"></i> Adicionar</button>
                        </div>
                    </div>
                    <!-- /.col-lg-4 -->
                </div>
                <div class="col-lg-4">
                    <!-- TO DO -->
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            Fazer Hoje
                        </div>
                        <div class="panel-body">
                            @foreach($project->lists as $item)
                                @if($item->type == TO_DO)
                                    <div class="alert alert-warning alert-dismissable">
                                        @if($item->user->id == Auth::user()->id)
                                            <button type="button" class="close removeItemList" data-dismiss="alert" aria-hidden="true" data-id="{{$item->id}}">×</button>
                                        @endif
                                        {{$item->description}}
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <div class="panel-footer">
                            <button class="btn btn-warning btn-xs addItemList"  data-project="{{$project->id}}" data-type="{{TO_DO}}"> <i class="fa fa-plus-circle"></i> Adicionar</button>
                        </div>
                    </div>
                    <!-- /.col-lg-4 -->
                </div>
                <div class="col-lg-4">
                    <!-- IMPEDIMENTS -->
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            Impedimentos
                        </div>

                        <div class="panel-body">
                            @foreach($project->lists as $item)

                                @if($item->type == IMPEDIMENTS)
                                    <div class="alert alert-danger alert-dismissable">
                                        @if($item->user->id == Auth::user()->id)
                                            <button type="button" class="close removeItemList" data-dismiss="alert" aria-hidden="true" data-id="{{$item->id}}">×</button>
                                        @endif
                                        {{$item->description}}
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <div class="panel-footer">
                            <button class="btn btn-danger btn-xs addItemList" data-project="{{$project->id}}" data-type="{{IMPEDIMENTS}}"> <i class="fa fa-plus-circle"></i> Adicionar</button>
                        </div>
                    </div>
                    <!-- /.col-lg-4 -->
                </div>
                    @else
                    Você não faz parte de uma das Equipes desse Projeto.
                    @endif
            </div> <!--/painel body -->

        </div>
    </div>
    @include('modal.listDaily_create')
    @include('modal.team_users')
@stop
@section( 'scripts' )
    <script src="{{ url('js/listDaily.js') }}" type="text/javascript"></script>
    <script src="{{ url('js/team.js') }}" type="text/javascript"></script>
@stop