<?php

namespace App\Http\Controllers\Api\Dashboard;

use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\Dancer\TypeRequest;
use App\Repositories\TypeRepository;
use App\Transformers\TypeTransformer;
use Illuminate\Http\Request;

class TypeController extends ApiController
{

    protected $typeRepository;

    public function __construct(TypeRepository $typeRepository) {
        parent::__construct();

        $this->typeRepository = $typeRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index() {

        return $this->respondWithPaginator($this->typeRepository->page(), new TypeTransformer);
    }

    public function getList() {

        return $this->respondWithCollection($this->typeRepository->page(), new TypeTransformer);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \App\Http\Controllers\Api\json|\Illuminate\Http\JsonResponse
     */
    public function store(TypeRequest $request) {
        $message = $this->typeRepository->store($request->all());

        return $message ? $this->errorWrongArgs($message) : $this->noContent();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($id) {

        return $this->respondWithItem($this->typeRepository->getById($id), new TypeTransformer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     *
     * @return \App\Http\Controllers\Api\json|\Illuminate\Http\JsonResponse
     */
    public function update(TypeRequest $request, $id) {
        $message = $this->typeRepository->update($id, $request->all());

        return $message ? $this->errorWrongArgs($message) : $this->noContent();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \App\Http\Controllers\Api\json|\Illuminate\Http\JsonResponse
     */
    public function destroy($id) {
        $message = $this->typeRepository->destroy($id);

        return $message ? $this->errorForbidden($message) : $this->noContent();
    }
}
