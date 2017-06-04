<?php

namespace App\Http\Controllers\Api\Dashboard;

use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\Dancer\DancerRequest;
use App\Http\Requests\Relation\DancerSlotRequest;
use App\Http\Requests\Relation\DancerTechnologyRequest;
use App\Repositories\DancerRepository;
use App\Transformers\AttributeTransformer;
use App\Transformers\DancerTransformer;
use App\Transformers\TechnologyTransformer;

class DancerController extends ApiController
{
    protected $dancerRepository;

    public function __construct(DancerRepository $dancerRepository) {
        parent::__construct();

        $this->dancerRepository = $dancerRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return $this->respondWithPaginator($this->dancerRepository->page(), new DancerTransformer);
    }

    public function getList() {
        return $this->respondWithCollection($this->dancerRepository->all(), new DancerTransformer);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(DancerRequest $request) {
        $message = $this->dancerRepository->store($request->all());

        return $message ? $this->errorWrongArgs($message) : $this->noContent();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        return $this->respondWithItem($this->dancerRepository->getById($id), new DancerTransformer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(DancerRequest $request, $id) {
        $message = $this->dancerRepository->update($id, $request->all());

        return $message ? $this->errorWrongArgs($message) : $this->noContent();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $message = $this->dancerRepository->destroy($id);

        return $message ? $this->errorForbidden($message) : $this->noContent();
    }

    public function getByAttributes($id) {
        return $this->respondWithItem($this->dancerRepository->getByAttributes($id), new AttributeTransformer);
    }

    public function getByTechnologies($id) {
        return $this->respondWithCollection($this->dancerRepository->getByTechnologies($id), new TechnologyTransformer);
    }

    public function syncTechnologies(DancerTechnologyRequest $request) {
        $message = $this->dancerRepository->syncTechnologies($request->id, $request->syncIds);

        return $message ? $this->errorWrongArgs($message) : $this->noContent();
    }

    public function syncSlots(DancerSlotRequest $request) {
        $message = $this->dancerRepository->syncSlots($request->id, $request->slots);

        return $message ? $this->errorWrongArgs($message) : $this->noContent();
    }
}
