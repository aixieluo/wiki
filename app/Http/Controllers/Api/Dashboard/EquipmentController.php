<?php

namespace App\Http\Controllers\Api\Dashboard;

use App\Http\Controllers\Api\ApiController;
use App\Repositories\EquipmentRepository;
use App\Transformers\EquipmentTransformer;
use Illuminate\Http\Request;

class EquipmentController extends ApiController
{

    protected $equipment;

    public function __construct(EquipmentRepository $equipmentRepository) {
        parent::__construct();

        $this->equipment = $equipmentRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->respondWithPaginator($this->equipment->page(), new EquipmentTransformer);
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
        $this->equipment->destroy($id);

        return $this->noContent();
    }
}
