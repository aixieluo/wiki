<?php

namespace App\Http\Controllers\Api\Dashboard;

use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\Equipment\EquipmentInfoRequest;
use App\Repositories\EquipmentInfoRepository;
use App\Transformers\EquipmentInfoTransformer;

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
    public function store(EquipmentInfoRequest $request) {
        $message = $this->equipmentInfoRepository->store($request->all());
        if ($message) {

            return $this->errorWrongArgs($message);
        }

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
    public function update(EquipmentInfoRequest $request, $id) {
        $message = $this->equipmentInfoRepository->update($id, $request->all());
        if ($message) {

            return $this->errorWrongArgs($message);
        }

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
        $message = $this->equipmentInfoRepository->destroy($id);
        if ($message) {

            return $this->errorForbidden($message);
        }

        return $this->noContent();
    }
}
