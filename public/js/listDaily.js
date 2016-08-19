$('.addItemList').on('click', function () {
    
    var project_id = $(this).attr('data-project');
    var type_list =  $(this).attr('data-type');

    if(type_list == 1){
        $('#headerStyle').css('background-color','#5cb85c');
        $('#labelType').text('Add Feito Ontem');
    }
    if(type_list == 2){
        $('#headerStyle').css('background-color','#f0ad4e');
        $('#labelType').text('Add Fazer Hoje');
    }
    if(type_list == 3){
        $('#headerStyle').css('background-color','#d9534f');
        $('#labelType').text('Add Impedimentos');
    }
    $('#projectReference').val(project_id);
    $('#typeReference').val(type_list);
    $('#modalAddItemList').modal();
});

$('.removeItemList').on('click', function () {

    var list_id = $(this).attr('data-id');
    var url =  urlAPP()+'lists/'+list_id;
    $.ajax({
        url: url,
        data: { "_token": "{{ csrf_token() }}" },
        type: 'DELETE',
        success: function(result) {
            console.log(result);
        }
    });
});