<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\TeamRequest;
use App\Http\Controllers\Controller;
use App\Team;
use App\Project;

class TeamController extends Controller
{
    protected $output = [
        'success' => [
            'status'  => 'success',
            'message' => 'Equipe salva com sucesso.',
            'icon'   => 'fa-check-circle-o'
        ],
        'error' => [
            'status' => 'danger',
            'message' => 'Erro ao tentar realizar o processo.',
            'icon'    => 'fa-times-circle-o'
        ],
        'update' => [
            'status' => 'success',
            'message' => 'Equipe atualizada com sucesso',
            'icon'    => 'fa-check-circle-o'
        ],
        'delete' => [
            'status' => 'ok',
            'message' => 'Equipe removida com sucesso.',
            'icon'   => 'fa-check-circle-o'
        ]
    ];


    protected $teamModel;
    protected $projectModel;

    public function __construct(Team $team, Project $project)
    {
        $this->teamModel = $team;
        $this->projectModel = $project;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*PAGES - boostrap/autoload.php*/
        $teams = $this->teamModel->paginate(PAGES);

        return view('team.index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('team.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeamRequest $request)
    {
        //insert Team
        $team = $this->teamModel->create($request->all());
        $id = $team->user_id;

        if( $team->save() ) {
            //first member of the team is the creator, add relationship
            $team->members()->attach($id);

            return redirect()->to('teams/')->with($this->output['success']);
        }else {
            return redirect()->to('teams/')->with($this->output['error']);
        }

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
        $team = $this->teamModel->find($id);

        return view('team.edit',compact('team'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TeamRequest $request, $id)
    {

        $team = $this->teamModel->find($id);

        if( $team->update($request->all()) ) {
            return redirect()->to('teams/')->with($this->output['update']);
        }else {
            return redirect()->to('teams/')->with($this->output['error']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $team = $this->teamModel->find($id);

        $team->projects()->detach();/*remove relatioship with projects*/
        $team->members()->detach();/*remove relationshio with users*/

        if($team->delete()){
            return response()->json($this->output['delete']);
        }else{
            return response()->json($this->output['error']);
        }

    }

    public function members($id)
    {
        /*return members in JSON*/
        $team = $this->teamModel->find($id);

        $users = $team->members;

        return response()->json($users);
    }
    public function projects($id)
    {
        /*return projects in JSON*/
        $team = $this->teamModel->find($id);

        $projects = $team->projects;

        return response()->json($projects);
    }

    public function addRemoveProject($idProject,$idTeam)
    {
        //insert relationship Project-Team

        $team = $this->teamModel->find($idTeam);
        $status = 0;/*status: if status>0 exist relationship*/

        foreach ($team->projects as $project):
            /*teste if exist it's team of the Project*/
            if($idProject == $project->id):
                $status++;
            endif;

        endforeach;
        if($status > 0){
            /*remove, if exist relationship*/
            $team->projects()->detach($idProject);
            return response()->json($this->output['delete']);
        }else{
            /*add,if not exist elationship*/
            $team->projects()->attach($idProject);
            return response()->json($this->output['success']);
        }
        
    }
    public function addRemoveMember($idUser, $idTeam)
    {
        //insert relationship User-Team

        $team = $this->teamModel->find($idTeam);
        $status = 0;
        foreach ($team->members as $user):
            /*status: if exist relationship incremet status*/
            if($idUser == $user->id):
                $status++;
            endif;

        endforeach;

        if($status > 0){
            /*remove if exist relationship*/
            $team->members()->detach($idUser);
            return response()->json($this->output['delete']);
        }else{
            /*add if not exist elationship*/
            $team->members()->attach($idUser);
            return response()->json($this->output['success']);
        }                                                                                                           
    }
    public function all($idProject)
    {
        /*PAGES - boostrap/autoload.php*/
        $teams = $this->teamModel->paginate(PAGES);
        $results = array();/*id's teams*/
        $project = $this->projectModel->find($idProject);

        foreach ($teams as $team):
            $results[$team->id] = false;/*the team, default, not percente this Project */
            foreach ($project->teams as $teamProject):
                if($team->id == $teamProject->id):
                    /*if the team working on the project, change to true*/
                    $results[$team->id] = true;
                endif;
            endforeach;
        endforeach;

        return view('project.teams', compact('teams','project','results'));
    }
}
