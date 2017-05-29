<?php

namespace App\Http\Controllers\Api\Dashboard;

use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\Equipment\EquipmentRequest;
use App\Repositories\EquipmentRepository;
use App\Transformers\AttributeTransformer;
use App\Transformers\EquipmentTransformer;

class EquipmentController extends ApiController
{

    protected $equipmentRepository;

    public function __construct(EquipmentRepository $equipmentRepository) {
        parent::__construct();

        $this->equipmentRepository = $equipmentRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($pId)
    {
        return $this->respondWithPaginator($this->equipmentRepository->page($pId), new EquipmentTransformer);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EquipmentRequest $request)
    {
        $this->equipmentRepository->store($request->all());
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $this->respondWithItem($this->equipmentRepository->getById($id), new EquipmentTransformer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EquipmentRequest $request, $id)
    {
        $this->equipmentRepository->update($id, $request->all());

        return $this->noContent();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->equipmentRepository->destroy($id);

        return $this->noContent();
    }

    public function getByAttributes($id) {

        return $this->respondWithItem($this->equipmentRepository->getByAttributes($id), new AttributeTransformer);
    }
}
