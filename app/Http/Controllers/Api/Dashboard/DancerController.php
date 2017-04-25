<?php

namespace App\Http\Controllers\Api\Dashboard;

use App\Http\Controllers\Api\ApiController;
use App\Repositories\DancerRepository;
use App\Transformers\AttributeTransformer;
use App\Transformers\DancerTransformer;
use Illuminate\Http\Request;

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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this->dancerRepository->store($request->all());
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
    public function update(Request $request, $id) {
        $this->dancerRepository->update($id, $request->all());

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
        $this->dancerRepository->destroy($id);

        return $this->noContent();
    }

    public function getByAttributes($id) {

        return $this->respondWithItem($this->dancerRepository->getByAttributes($id), new AttributeTransformer);
    }
}
