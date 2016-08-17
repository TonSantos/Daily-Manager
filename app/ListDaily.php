<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListDaily extends Model
{
    /*type - DONE:1,TO_DO:2,IMPEDIMENTS:3 in bootstrap/autoload.php*/

    protected $fillable = ['description','type','user_id','project_id'];
    protected $table = 'lists';

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function project()
    {
        return $this->belongsTo('App\Project');
    }
}
