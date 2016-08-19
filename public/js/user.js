$('.inforTeamsUser').on('click', function () {
    var id = $(this).attr('data-id');
    var name = $(this).attr('data-name');

    $url = urlAPP() + 'member-teams/'+id;

    $.get( $url, function ( data ) {
        $('#teamsMember').html(loading);
        $('#nameUser').text(loadingLabel);

        var bodyTable = '';
        if(data.length > 0){
            for(var i=0;i<data.length;i++){
                bodyTable += '<tr >'+
                    '<td >'+data[i].name+'</td>'+
                    '<td >'+data[i].description+'</td>'+
                    '</tr>';
            }
        }else{
            bodyTable = '<tr >'+
                '<td >não participa de nenhuma Equipe</td>'+
                '<td >#</td>'+
                '</tr>';
        }

        $('#teamsMember').html(bodyTable);
        $('#nameUser').text(name);
    });
    $('#inforUserTeams').modal();
});