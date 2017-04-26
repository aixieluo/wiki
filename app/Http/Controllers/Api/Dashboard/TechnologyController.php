<?php

namespace App\Http\Controllers\Api\Dashboard;

use App\Http\Controllers\Api\ApiController;
use App\Repositories\TechnologyRepository;
use App\Transformers\AttributeTransformer;
use App\Transformers\TechnologyTransformer;
use Illuminate\Http\Request;

class TechnologyController extends ApiController
{
    protected $technologyRepository;

    public function __construct(TechnologyRepository $technologyRepository) {
        parent::__construct();

        $this->technologyRepository = $technologyRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return $this->respondWithPaginator($this->technologyRepository->page(), new TechnologyTransformer);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this->technologyRepository->store($request->all());

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
        return $this->respondWithItem($this->technologyRepository->getById($id), new TechnologyTransformer);
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
        $this->technologyRepository->update($id, $request->all());

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
        $this->technologyRepository->destroy($id);

        return $this->noContent();
    }

    public function getByAttributes($id) {

        return $this->respondWithItem($this->technologyRepository->getByAttributes($id), new AttributeTransformer);
    }
}
