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
     * @return \Illuminate\Http\Response
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
     * @return \Illuminate\Http\Response
     */
    public function store(TypeRequest $request) {
        $this->typeRepository->store($request->all());

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
        return $this->respondWithItem($this->typeRepository->getById($id), new TypeTransformer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(TypeRequest $request, $id) {
        $this->typeRepository->update($id, $request->all());

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
        $this->typeRepository->destroy($id);

        return $this->noContent();
    }
}
