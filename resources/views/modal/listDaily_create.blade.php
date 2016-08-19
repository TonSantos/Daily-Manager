<!-- Modal -->
<div class="modal fade" id="modalAddItemList" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" id="headerStyle">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="editDocuHidden"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><label id="labelType"></label></h4>
            </div>
            <div class="modal-body">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><b><i class="fa fa-plus-circle" aria-hidden="true"></i> Adicionar item</b></h3>
                    </div>
                    <div class="panel-body">
                        {!! Form::open(['route' => 'lists.store']) !!}
                        <div class="form-group">
                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                            <input type="hidden" name="project_id" id="projectReference">
                            <input type="hidden" name="type" id="typeReference">
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
                        {!! Form::close() !!}
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>