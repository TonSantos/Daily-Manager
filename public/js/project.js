$('.inforTeamsProject').on('click', function () {

    var id = $(this).attr('data-id');
    var name = $(this).attr('data-name');

    $url = urlAPP() + 'app/project-teams/'+id;

    $.get( $url, function ( data ) {

        var bodyTable = '';
        if(data.length > 0){
            for(var i=0;i<data.length;i++){
                bodyTable += '<tr >'+
                    '<td >'+data[i].name+'</td>'+
                    '<td >'+data[i].description+'</td>'+
                    '</tr>'
            }
            console.log(bodyTable);
        }else{
            bodyTable = '<tr >'+
                '<td >Esse Projeto ainda não possui uma equipe</td>'+
                '<td >#</td>'+
                '</tr>';
        }

        $('#teamsProject').html(bodyTable);
        $('#nameProjectTeam').text(name);
    });
    $('#inforProjectTeams').modal();
});