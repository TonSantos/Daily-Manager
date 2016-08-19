<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Team;

class UserController extends Controller
{
    protected $userModel;
    protected $teamModel;

    public function __construct(User $user, Team $team)
    {
        $this->userModel = $user;
        $this->teamModel = $team;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*PAGES - boostrap/autoload.php*/
        $users = $this->userModel->paginate(PAGES);

        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function projects($id)
    {
        /*projects in user member team of project*/

        $user = $this->userModel->find($id);
        $teams = $user->teams;
        $projects = array();
        foreach ($teams as $team):
            foreach ($team->projects as $project):
                /*checking if the member is part of more than one Team with the same Project */
                if(count($projects) > 0):
                        $aux = 0;
                    foreach ($projects as $projectAux):
                            if($project->id == $projectAux->id):
                                $aux++;
                            endif;
                    endforeach;

                    if($aux == 0):/* not find same Project*/
                        $projects[] = $project;
                    endif;

                else:
                    $projects[] = $project;
                endif;

            endforeach;
        endforeach;
        
        return view('user.projects', compact('projects'));
    }

    public function all($idTeam)
    {
        /*PAGES - boostrap/autoload.php*/
        $users = $this->userModel->paginate(PAGES);
        $team = $this->teamModel->find($idTeam);

        return view('team.users', compact('users','team'));

    }
    public function teams($id)
    {
        $user = $this->userModel->find($id);
        $teams = $user->teams;

        return view('user.teams', compact('teams'));
    }
    public function teamsJson($id)
    {
        $user = $this->userModel->find($id);
        $teams = $user->teams;

        return response()->json($teams);
    }
}
