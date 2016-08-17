/*scripst for Teams*/

$('.inforUsersTeam').on('click', function () {
        var id = $(this).attr('data-id');
        var name = $(this).attr('data-name');

    $url = urlAPP() + 'app/team-members/'+id;

    $.get( $url, function ( data ) {
       var bodyTable = '';
        for(var i=0;i<data.length;i++){
            bodyTable += '<tr >'+
                        '<td >'+data[i].name+'</td>'+
                        '<td >'+data[i].email+'</td>'+
                        '</tr>';
        }
        $('#membersTeam').html(bodyTable);
        $('#nameTeam').text(name);
    });
        $('#inforTeamUsers').modal();
});

$('.inforProjectsTeam').on('click', function () {

    var id = $(this).attr('data-id');
    var name = $(this).attr('data-name');

    $url = urlAPP() + 'app/team-projects/'+id;

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
                '<td >Essa equipe não possui Projetos</td>'+
                '<td >#</td>'+
                '</tr>';
        }

        $('#projectsTeam').html(bodyTable);
        $('#nameTeamProject').text(name);
    });
    $('#inforTeamProjects').modal();
});

$('.addProjectTeam').on('click', function () {
    var project_id = $(this).attr('data-project');
    var team_id = $(this).attr('data-team');
    var url = urlAPP() + 'app/team-project/'+project_id+'/'+team_id;
    $.get( url, function ( data ) {
        console.log(data);
        if(data.status == 'success'){
            $("#statusAdd"+project_id).html('<i class="fa fa-check-circle-o fa-2x" style="color:green"></i>');
        }
    });
});

$('.addMemberTeam').on('click', function () {
    var user_id = $(this).attr('data-user');
    var team_id = $(this).attr('data-team');
    var url = urlAPP() + 'app/team-member/'+user_id+'/'+team_id;
    $.get( url, function ( data ) {
        console.log(data);
        if(data.status == 'success'){
            $("#statusAddUser"+user_id).html('<i class="fa fa-check-circle-o fa-2x" style="color:green"></i>');
        }
    });
});
