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

        @include('messages.status')


        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><b>#DIA {{$day->id}} - {{$day->created_at}}</b></h3>
            </div>
            <div class="panel-body">

            </div>

        </div>
    </div>

@stop