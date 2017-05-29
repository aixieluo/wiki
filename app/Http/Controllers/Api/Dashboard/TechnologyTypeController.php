<?php

namespace App\Http\Controllers\Api\Dashboard;

use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\Technology\TechnologyTypeRequest;
use App\Repositories\TechnologyTypeRepository;
use App\Transformers\TechnologyTypeTransformer;

class TechnologyTypeController extends ApiController
{
    protected $technologyTypeRepository;

    public function __construct(TechnologyTypeRepository $technologyTypeRepository) {
        parent::__construct();

        $this->technologyTypeRepository = $technologyTypeRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($gId) {

        return $this->respondWithPaginator($this->technologyTypeRepository->page($gId), new TechnologyTypeTransformer);
    }

    public function getList() {

        return $this->respondWithCollection($this->technologyTypeRepository->all(), new TechnologyTypeTransformer);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(TechnologyTypeRequest $request) {
        $message = $this->technologyTypeRepository->store($request->all());
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

        return $this->respondWithItem($this->technologyTypeRepository->getById($id), new TechnologyTypeTransformer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(TechnologyTypeRequest $request, $id) {
        $message = $this->technologyTypeRepository->update($id, $request->all());
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
        $message = $this->technologyTypeRepository->destroy($id);
        if ($message) {

            return $this->errorForbidden($message);
        }

        return $this->noContent();
    }
}
