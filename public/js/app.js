'use strict'

var ENVIRONMENT = 'development';

var urlAPP = function() {
    if ( ENVIRONMENT == "testing" || ENVIRONMENT == "production" ) {
        return 'http://www.endereco.com.br'
    } else {
        return location.protocol + '//' + location.host + '/'
    }
}