<!-- Text input-->
<div class="form-group">
    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
    <div class='form-group'>
        {!! Form::label('name', 'Nome:') !!}
        {!! Form::text('name', null, ['class' => 'form-control input-md']) !!}
    </div>
    <div class='form-group'>
        {!! Form::label('description', 'Descrição:') !!}
        {!! Form::text('description', null, ['class' => 'form-control input-md']) !!}
    </div>

</div>

<div class="clearfix"></div>
<br />

<!-- Button -->
<div class="form-group">

    {!! Form::button('Salvar <i class="fa fa-floppy-o"></i>', ['type' => 'submit', 'class' => 'btn btn-primary'] )  !!}

</div>