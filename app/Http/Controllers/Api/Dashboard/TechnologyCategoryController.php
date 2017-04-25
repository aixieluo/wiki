<?php

namespace App\Http\Controllers\Api\Dashboard;

use App\Http\Controllers\Api\ApiController;
use App\Repositories\TechnologyCategoryRepository;
use App\Transformers\TechnologyCategoryTransformer;
use Illuminate\Http\Request;

class TechnologyCategoryController extends ApiController
{
    protected $technologyCategoryRepository;

    public function __construct(TechnologyCategoryRepository $technologyCategoryRepository) {
        parent::__construct();

        $this->technologyCategoryRepository = $technologyCategoryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return $this->respondWithPaginator($this->technologyCategoryRepository->page(), new TechnologyCategoryTransformer);
    }

    public function getList() {
        return $this->respondWithCollection($this->technologyCategoryRepository->page(), new TechnologyCategoryTransformer);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this->technologyCategoryRepository->store($request->all());

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
        return $this->respondWithItem($this->technologyCategoryRepository->getById($id), new TechnologyCategoryTransformer);
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
        $this->technologyCategoryRepository->update($id, $request->all());

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
        $this->technologyCategoryRepository->destroy($id);

        return $this->noContent();
    }
}
