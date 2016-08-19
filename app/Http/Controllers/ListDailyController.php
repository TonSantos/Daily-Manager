<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\http\Requests\ListDailyRequest;
use App\Http\Controllers\Controller;
use App\ListDaily;

class ListDailyController extends Controller
{
    protected $output = [
        'success' => [
            'status'  => 'success',
            'message' => 'Item inserido com sucesso.',
            'icon'   => 'fa-check-circle-o'
        ],
        'error' => [
            'status' => 'danger',
            'message' => 'Erro ao tentar realizar o processo.',
            'icon'    => 'fa fa-times-circle-o'
        ],
        'update' => [
            'status' => 'success',
            'message' => 'Item atualizado com sucesso',
            'icon'    => 'fa-check-circle-o'
        ],
        'delete' => [
            'status' => 'success',
            'message' => 'Item removido com sucesso.',
            'icon'   => 'fa-check-circle-o'
        ]
    ];
    protected $listDailyModel;

    public function __construct(ListDaily $listDaily)
    {
        $this->listDailyModel = $listDaily;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(ListDailyRequest $request)
    {
        //insert Item List
        $itemList = $this->listDailyModel->create($request->all());
        
        if( $itemList->save() ) {
            return redirect()->to('projects/'.$itemList->project_id)->with($this->output['success']);
        }else {
            return redirect()->to('projects/'.$itemList->project_id)->with($this->output['error']);
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
        $itemList = $this->listDailyModel->find($id);

        if($itemList->delete()){
            return response()->json($this->output['delete']);
        }else{
            return response()->json($this->output['error']);
        }
    }
}
