<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    /*user_id: The team leader*/

    protected $fillable = ['name','description','user_id'];

    public function user()
    {
        /*leader Team*/
        return $this->belongsTo(User::class);
    }
    public function members()
    {
        return $this->belongsToMany(User::class, 'user_team');
    }
    public function projects()
    {
        return $this->belongsToMany(Project::class, 'project_team');
    }
}
