<?php

namespace App\Http\Controllers\Api\Dashboard;

use App\Http\Controllers\Api\ApiController;
use App\Repositories\SkillInfoRepository;
use App\Transformers\SkillInfoTransformer;
use Illuminate\Http\Request;

class SkillInfoController extends ApiController
{
    protected $skillInfo;

    public function __construct(SkillInfoRepository $skillInfoRepository) {
        parent::__construct();

        $this->skillInfo = $skillInfoRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return $this->respondWithPaginator($this->skillInfo->page(), new SkillInfoTransformer);
    }

    public function getList() {
        return $this->respondWithCollection($this->skillInfo->page(), new SkillInfoTransformer);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this->skillInfo->store($request->all());

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
        return $this->respondWithItem($this->skillInfo->getById($id), new SkillInfoTransformer);
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
        $this->skillInfo->update($id, $request->all());

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
        $this->skillInfo->destroy($id);

        return $this->noContent();
    }
}
