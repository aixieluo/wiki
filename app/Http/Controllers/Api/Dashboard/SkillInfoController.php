<?php

namespace App\Http\Controllers\Api\Dashboard;

use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\Skill\SkillInfoRequest;
use App\Repositories\SkillInfoRepository;
use App\Transformers\SkillInfoTransformer;

class SkillInfoController extends ApiController
{
    protected $skillInfoRepository;

    public function __construct(SkillInfoRepository $skillInfoRepository) {
        parent::__construct();

        $this->skillInfoRepository = $skillInfoRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return $this->respondWithPaginator($this->skillInfoRepository->page(), new SkillInfoTransformer);
    }

    public function getList() {
        return $this->respondWithCollection($this->skillInfoRepository->page(), new SkillInfoTransformer);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(SkillInfoRequest $request) {
        $message = $this->skillInfoRepository->store($request->all());
        return $message ? $this->errorWrongArgs($message) : $this->noContent();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        return $this->respondWithItem($this->skillInfoRepository->getById($id), new SkillInfoTransformer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(SkillInfoRequest $request, $id) {
        $message = $this->skillInfoRepository->update($id, $request->all());
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
        $message = $this->skillInfoRepository->destroy($id);
        if ($message) {

            return $this->errorForbidden($message);
        }

        return $this->noContent();
    }
}
