<?php

namespace App\Http\Controllers\Api\Dashboard;

use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\TypeRequest;
use App\Repositories\TypeRepository;
use App\Transformers\TypeTransformer;
use Illuminate\Http\Request;

class TypeController extends ApiController
{

    protected $type;

    public function __construct(TypeRepository $typeRepository) {
        parent::__construct();

        $this->type = $typeRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return $this->respondWithPaginator($this->type->page(), new TypeTransformer);
    }

    public function getList() {

        return $this->respondWithCollection($this->type->page(), new TypeTransformer);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(TypeRequest $request) {
        $this->type->store($request->all());

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
        return $this->respondWithItem($this->type->getById($id), new TypeTransformer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(TypeRequest $request, $id) {
        $this->type->update($id, $request->all());

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
        $this->type->destroy($id);

        return $this->noContent();
    }
}
