<!-- Modal -->
<div class="modal fade" id="modalDeleteConfirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color:darkred">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"> <label id="labelNameType" style="color:white;"></label></h4>
            </div>
            <div class="modal-body">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><b><i class="fa fa-trash" aria-hidden="true"></i> <label id="itemName"></label></b></h3>
                    </div>
                    <div class="panel-body">

                        <div class="form-group">
                            <input id="idElement" type="hidden" name="" value="" >

                                <div class="alert alert-danger">
                                    <div align="center"><i class="fa fa-exclamation-triangle"></i> Atenção</div><br> <label id="bodyMessege"> </label>
                                </div>

                        </div>
                        <div class="clearfix"></div>

                    </div>

                </div>
                <div class="footer" align="right">
                    <button class="btn" data-dismiss="modal" ><label id="close">Cancelar</label></button>
                    <button class="btn btn-danger" data-dismiss="modal" id="deleteConfirmButton" data-id="" data-type="" data-name="">Excluir</button>
                </div>
            </div>
        </div>
    </div>
</div>