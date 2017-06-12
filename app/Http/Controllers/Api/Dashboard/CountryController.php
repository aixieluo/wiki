<?php

namespace App\Http\Controllers\Api\Dashboard;

use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\Dancer\CountryRequest;
use App\Repositories\CountryRepository;
use App\Transformers\CountryTransformer;

class CountryController extends ApiController
{
    protected $countryRepository;

    public function __construct(CountryRepository $countryRepository) {
        parent::__construct();

        $this->countryRepository = $countryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index() {
        return $this->respondWithPaginator($this->countryRepository->page(), new CountryTransformer);
    }

    public function getList() {
        return $this->respondWithCollection($this->countryRepository->page(), new CountryTransformer);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \App\Http\Controllers\Api\json|\Illuminate\Http\JsonResponse
     */
    public function store(CountryRequest $request) {
        $message = $this->countryRepository->store($request->all());

        return $message ? $this->errorWrongArgs($message) : $this->noContent();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($id) {
        return $this->respondWithItem($this->countryRepository->getById($id), new CountryTransformer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     *
     * @return \App\Http\Controllers\Api\json|\Illuminate\Http\JsonResponse
     */
    public function update(CountryRequest $request, $id) {
        $message = $this->countryRepository->update($id, $request->all());

        return $message ? $this->errorWrongArgs($message) : $this->noContent();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \App\Http\Controllers\Api\json|\Illuminate\Http\JsonResponse
     */
    public function destroy($id) {
        $message = $this->countryRepository->destroy($id);

        return $message ? $this->errorForbidden($message) : $this->noContent();
    }
}
