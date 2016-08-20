
$('.deleteButton').on('click', function () {
    $('#resultDelete').html('');
    var id = $(this).attr('data-id');
    var name = $(this).attr('data-name');
    var type = $(this).attr('data-type');
    if(type == "Equipe"){
        var messege = "Você tem certeza que deseja excluir essa Equipe? A equipe pode conter Membros e Projetos Ativos";
        var url = urlAPP()+'teams/'+id;
    }
    if(type == "Projeto"){
        var messege = "Você tem certeza que deseja excluir esse Projeto? Pode existe Equipes ativas trabalhando nesse Projeto";
        var url = urlAPP()+'projects/'+id;
    }

    $('#deleteConfirmButton').attr('data-id',id);
    $('#deleteConfirmButton').attr('data-type',type);
    $('#deleteConfirmButton').attr('data-name',name);

    $('#labelNameType').text('Excluir '+type);
    $('#idElement').val(id);
    $('#itemName').text(name);
    $('#bodyMessege').text(messege);

    $('#modalDeleteConfirm').modal();
});

$('#deleteConfirmButton').on('click', function () {
    var id = $(this).attr('data-id');
    var name = $(this).attr('data-name');
    var type = $(this).attr('data-type');
    

    if(type == "Equipe"){
        var messege = "Equipe "+name+" excluída com sucesso.";
        var url = urlAPP()+'teams/'+id;
    }
    if(type == "Projeto"){
        var messege = "Projeto "+name+" excluído com sucesso";
        var url = urlAPP()+'projects/'+id;
    }

    $.ajax({
        url: url,
        data: { "_token": "{{ csrf_token() }}" },
        type: 'DELETE',
        success: function(result) {
            console.log(messege);
            if(result.status == 'ok'){
                $('#resultDelete').html('<div class="alert alert-success">'+
                                        '<div align="center"><i class="fa fa-check-circle"></i> '+ result.message +
                                        '</div></div>');
                $('#rowElement'+id).hide('slow');
                $(this).remove();
            }else{

            }
        }
    });
});