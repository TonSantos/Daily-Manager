@extends( 'layouts.admin' )

@section( 'content' )

    <div class="container-fluid">


        <ol class="breadcrumb">
            <li>
                <i class="fa fa-home"></i> <a href="{{url('/')}}"> Ínicio</a>
            </li>
            <li class="active">
                <i class="fa fa-users"></i> <a href="{{ route('teams.index') }}"> Equipes</a>
            </li>
            <li class="active">
                <i class="fa fa-pencil"></i> Editar
            </li>
        </ol>


        <br />

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><b><i class="fa fa-plus-circle" aria-hidden="true"></i> Editar Equipe</b></h3>
            </div>
            <div class="panel-body">
                @include('messages.status')
                {!! Form::model($team, array('route' => array('teams.update', $team->id))) !!}
                <input type="hidden" name="_method" value="PUT">
                @include('forms._form_teams')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

@stop