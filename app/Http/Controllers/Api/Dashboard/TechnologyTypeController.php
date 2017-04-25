<?php

namespace App\Http\Controllers\Api\Dashboard;

use App\Http\Controllers\Api\ApiController;
use App\Repositories\TechnologyTypeRepository;
use App\Transformers\TechnologyTypeTransformer;
use Illuminate\Http\Request;

class TechnologyTypeController extends ApiController
{
    protected $technologyType;

    public function __construct(TechnologyTypeRepository $technologyTypeRepository) {
        parent::__construct();

        $this->technologyType = $technologyTypeRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->respondWithPaginator($this->technologyType->page(), new TechnologyTypeTransformer);
    }

    public function getList() {
        return $this->respondWithCollection($this->technologyType->page(), new TechnologyTypeTransformer);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->technologyType->store($request->all());

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
        return $this->respondWithItem($this->technologyType->getById($id), new TechnologyTypeTransformer);
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
        $this->technologyType->update($id, $request->all());

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
        $this->technologyType->destroy($id);

        return $this->noContent();
    }
}
