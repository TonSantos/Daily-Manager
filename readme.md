## Laravel PHP Framework

### Instalados / Habilitados

* Laravel 5.1.*
* Bestmomo Scafold
* Illuminate Form
* Whoops
* Bower + Gulp: Bootstrap, Jquery, Font Awesome
* Presenters
* intervention
* Template: SB Admin

### Deploy
* composer install
* bower install
* php artisan migrate
* php artisan key:generate
* generate file .env for connection DB
* php artisan serve - test

### Relationship
* User many-to-many Team
* Leader(User) one-to-many Team
* Project many-to-many Team
* Leader(User) one-to-many Project
* User one-to-many ListDaily
* Project one-to-many ListDaily
