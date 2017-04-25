<?php

namespace App\Http\Controllers\Api\Dashboard;

use App\Http\Controllers\Api\ApiController;
use App\Repositories\TechnologyCategoryRepository;
use App\Transformers\TechnologyCategoryTransformer;
use Illuminate\Http\Request;

class TechnologyCategoryController extends ApiController
{
    protected $technologyCategory;

    public function __construct(TechnologyCategoryRepository $technologyCategoryRepository) {
        parent::__construct();

        $this->technologyCategory = $technologyCategoryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return $this->respondWithPaginator($this->technologyCategory->page(), new TechnologyCategoryTransformer);
    }

    public function getList() {
        return $this->respondWithCollection($this->technologyCategory->page(), new TechnologyCategoryTransformer);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this->technologyCategory->store($request->all());

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
        return $this->respondWithItem($this->technologyCategory->getById($id), new TechnologyCategoryTransformer);
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
        $this->technologyCategory->update($id, $request->all());

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
        $this->technologyCategory->destroy($id);

        return $this->noContent();
    }
}
