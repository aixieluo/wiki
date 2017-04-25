<?php

namespace App\Http\Controllers\Api\Dashboard;

use App\Http\Controllers\Api\ApiController;
use App\Repositories\EquipmentInfoRepository;
use App\Transformers\EquipmentInfoTransformer;
use Illuminate\Http\Request;

class EquipmentInfoController extends ApiController
{
    protected $equipmentInfoRepository;

    public function __construct(EquipmentInfoRepository $equipmentInfoRepository) {

        parent::__construct();

        $this->equipmentInfoRepository = $equipmentInfoRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        return $this->respondWithPaginator($this->equipmentInfoRepository->page(), new EquipmentInfoTransformer);
    }

    public function getList() {
        return $this->respondWithCollection($this->equipmentInfoRepository->page(), new EquipmentInfoTransformer);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this->equipmentInfoRepository->store($request->all());

        return $this->noContent();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {

        return $this->respondWithItem($this->equipmentInfoRepository->getById($id), new EquipmentInfoTransformer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {

        $this->equipmentInfoRepository->update($id, $request->all());

        return $this->noContent();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {

        $this->equipmentInfoRepository->destroy($id);

        return $this->noContent();
    }
}
