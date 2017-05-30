<?php

namespace App\Http\Controllers\Api\Dashboard;

use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\Tactic\TacticInfoRequest;
use App\Repositories\TacticInfoRepository;
use App\Transformers\TacticInfoTransformer;

class TacticInfoController extends ApiController
{
    protected $tacticInfoRepository;

    public function __construct(TacticInfoRepository $tacticInfoRepository) {
        parent::__construct();

        $this->tacticInfoRepository = $tacticInfoRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        return $this->respondWithPaginator($this->tacticInfoRepository->page(), new TacticInfoTransformer);
    }

    public function getList() {

        return $this->respondWithCollection($this->tacticInfoRepository->page(), new TacticInfoTransformer);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(TacticInfoRequest $request) {
        $message = $this->tacticInfoRepository->store($request->all());
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

        return $this->respondWithItem($this->tacticInfoRepository->getById($id), new TacticInfoTransformer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(TacticInfoRequest $request, $id) {
        $message = $this->tacticInfoRepository->update($id, $request->all());
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
        $message = $this->tacticInfoRepository->destroy($id);
        if ($message) {

            return $this->errorForbidden($message);
        }

        return $this->noContent();
    }
}
