<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
   
    protected $fillable = ['name','description','user_id'];

    public function user()
    {
        /*create project*/
        return $this->belongsTo(User::class);
    }
    
    public function lists()
    {
        return $this->hasMany('App\ListDaily');
    }
    public function teams()
    {
        return $this->belongsToMany(Team::class, 'project_team');
    }
}
