'use strict'

var ENVIRONMENT = 'development';

var urlAPP = function() {
    if ( ENVIRONMENT == "testing" || ENVIRONMENT == "production" ) {
        return 'http://www.endereco.com.br'
    } else {
        return location.protocol + '//' + location.host + '/'
    }
}

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
})

var loading = '<tr> <td colspan="2" style="text-align: center;"><i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>'+
    '<span class="sr-only">Loading...</span></td></tr>';
var loadingLabel = 'loading..';