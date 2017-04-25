<?php

namespace App\Http\Controllers\Api\Dashboard;

use App\Http\Controllers\Api\ApiController;
use App\Repositories\TacticInfoRepository;
use App\Transformers\TacticInfoTransformer;
use Illuminate\Http\Request;

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
    public function index()
    {
        return $this->respondWithPaginator($this->tacticInfoRepository->page(), new TacticInfoTransformer);
    }

    public function getList() {
        return $this->respondWithCollection($this->tacticInfoRepository->page(), new TacticInfoTransformer);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->tacticInfoRepository->store($request->all());

        return $this->noContent();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $this->respondWithItem($this->tacticInfoRepository->getById($id), new TacticInfoTransformer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->tacticInfoRepository->update($id, $request->all());

        return $this->noContent();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->tacticInfoRepository->destroy($id);

        return $this->noContent();
    }
}
