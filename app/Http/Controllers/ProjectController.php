<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\ProjectRequest;
use App\Http\Controllers\Controller;
use App\Team;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    protected $output = [
        'success' => [
            'status'  => 'success',
            'message' => 'Projeto salvo com sucesso.',
            'icon'   => 'fa-check-circle-o'
        ],
        'error' => [
            'status' => 'danger',
            'message' => 'Erro ao tentar realizar o processo.',
            'icon'    => 'fa fa-times-circle-o'
        ],
        'update' => [
            'status' => 'success',
            'message' => 'Projeto atualizado com sucesso',
            'icon'    => 'fa-check-circle-o'
        ],
        'delete' => [
            'status' => 'success',
            'message' => 'Projeto removido com sucesso.',
            'icon'   => 'fa-check-circle-o'
        ]
    ];
    protected $projectModel;
    protected $teamModel;

    public function __construct(Project $project, Team $team)
    {
        $this->projectModel = $project;
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
        $projects = $this->projectModel->paginate(PAGES);

        return view('project.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {
        $project = $this->projectModel->create($request->all());

        if( $project->save() ) {
            return redirect()->to('app/projects/')->with($this->output['success']);
        }else {
            return redirect()->to('app/projects/')->with($this->output['error']);
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
        $project = $this->projectModel->find($id);
        $status = 0;

        /*if user is from team it's project, status > 0*/
        foreach ($project->teams as $team):
            foreach ($team->members as $user):
                if($user->id == Auth::user()->id):
                    $status++;
                endif;
            endforeach;
        endforeach;

        return view('project.show', compact('project','status'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = $this->projectModel->find($id);

        return view('project.edit',compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectRequest $request, $id)
    {
        $project = $this->projectModel->find($id);

        if( $project->update($request->all()) ) {
            return redirect()->to('app/projects/')->with($this->output['update']);
        }else {
            return redirect()->to('app/projects/')->with($this->output['error']);
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
        //
    }

    public function all($idTeam)
    {
        /*PAGES - boostrap/autoload.php*/
        $projects = $this->projectModel->paginate(PAGES);
        $team = $this->teamModel->find($idTeam);

        return view('team.projects', compact('projects','team'));

    }

    public function teams($idProject)
    {
        $project = $this->projectModel->find($idProject);

        $teams = $project->teams;

        return response()->json($teams);

    }
}
