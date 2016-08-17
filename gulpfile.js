var elixir   = require('laravel-elixir');
var bowerDir = 'vendor/bower_components/';
 
elixir(function(mix) {
 mix.copy(bowerDir + 'bootstrap/fonts', 'public/fonts')
 mix.copy(bowerDir + 'font-awesome/fonts', 'public/fonts')
 
 .copy(bowerDir + 'jquery/dist/jquery.min.js', 'public/js/jquery.min.js')
 .copy(bowerDir + 'bootstrap/dist/js/bootstrap.min.js', 'public/js/bootstrap.min.js')
 .copy(bowerDir + 'font-awesome/css/font-awesome.min.css', 'public/css/font-awesome.min.css')
 .copy(bowerDir + 'bootstrap-fileinput/js/fileinput.min.js', 'public/js/fileinput.min.js')
 .copy(bowerDir + 'bootstrap-fileinput/js/fileinput_locale_pt-BR.js', 'public/js/fileinput_locale_pt-BR')
 .copy(bowerDir + 'bootstrap-fileinput/css/fileinput.min.css', 'public/css/fileinput.min.css')
 
 .less('app.less');
});