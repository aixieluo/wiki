<?php

namespace App\Http\Controllers\Api\Dashboard;

use App\Http\Controllers\Api\ApiController;
use App\Repositories\TacticInfoRepository;
use App\Transformers\TacticInfoTransformer;
use Illuminate\Http\Request;

class TacticInfoController extends ApiController
{
    protected $tacticInfo;

    public function __construct(TacticInfoRepository $tacticInfoRepository) {
        parent::__construct();

        $this->tacticInfo = $tacticInfoRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->respondWithPaginator($this->tacticInfo->page(), new TacticInfoTransformer);
    }

    public function getList() {
        return $this->respondWithCollection($this->tacticInfo->page(), new TacticInfoTransformer);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->tacticInfo->store($request->all());

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
        return $this->respondWithItem($this->tacticInfo->getById($id), new TacticInfoTransformer);
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
        $this->tacticInfo->update($id, $request->all());

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
        $this->tacticInfo->destroy($id);

        return $this->noContent();
    }
}
