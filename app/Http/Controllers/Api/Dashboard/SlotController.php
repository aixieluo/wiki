<?php

namespace App\Http\Controllers\Api\Dashboard;

use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\Equipment\SlotRequest;
use App\Repositories\SlotRepository;
use App\Transformers\SlotTransformer;

class SlotController extends ApiController
{
    protected $slotRepository;

    public function __construct(SlotRepository $slotRepository) {
        parent::__construct();

        $this->slotRepository = $slotRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        return $this->respondWithPaginator($this->slotRepository->page(), new SlotTransformer);
    }

    public function getList() {

        return $this->respondWithCollection($this->slotRepository->page(), new SlotTransformer);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(SlotRequest $request) {
        $message = $this->slotRepository->store($request->all());
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

        return $this->respondWithItem($this->slotRepository->getById($id), new SlotTransformer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(SlotRequest $request, $id) {
        $message = $this->slotRepository->update($id, $request->all());
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
        $message = $this->slotRepository->destroy($id);
        if ($message) {

            return $this->errorForbidden($message);
        }

        return $this->noContent();
    }
}
