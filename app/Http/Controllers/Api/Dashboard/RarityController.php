<?php

namespace App\Http\Controllers\Api\Dashboard;

use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\Dancer\RarityRequest;
use App\Repositories\RarityRepository;
use App\Transformers\RarityTransformer;

class RarityController extends ApiController
{
    protected $rarityRepository;

    public function __construct(RarityRepository $rarityRepository) {
        parent::__construct();

        $this->rarityRepository = $rarityRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return $this->respondWithPaginator($this->rarityRepository->page(), new RarityTransformer);
    }

    public function getList() {

        return $this->respondWithCollection($this->rarityRepository->page(), new RarityTransformer);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(RarityRequest $request) {
        $message = $this->rarityRepository->store($request->all());

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
        return $this->respondWithItem($this->rarityRepository->getById($id), new RarityTransformer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(RarityRequest $request, $id) {
        $message = $this->rarityRepository->update($id, $request->all());

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
        $message = $this->rarityRepository->destroy($id);

        return $message ? $this->errorForbidden($message) : $this->noContent();
    }
}
