$('.inforTeamsUser').on('click', function () {
    var id = $(this).attr('data-id');
    var name = $(this).attr('data-name');

    $url = urlAPP() + 'app/member-teams/'+id;

    $.get( $url, function ( data ) {
        var bodyTable = '';
        for(var i=0;i<data.length;i++){
            bodyTable += '<tr >'+
                '<td >'+data[i].name+'</td>'+
                '<td >'+data[i].description+'</td>'+
                '</tr>';
        }
        $('#teamsMember').html(bodyTable);
        $('#nameUser').text(name);
    });
    $('#inforUserTeams').modal();
});