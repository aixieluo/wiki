<?php

namespace App\Repositories;

use App\Http\Requests\DancerRequest;
use App\Models\Dancer;

class DancerRepository
{
    use BaseRepository;

    protected $model;

    public function __construct(Dancer $dancer) {
        $this->model = $dancer;
    }

    public function store(DancerRequest $request) {
        $dancer = $this->model->create($request->all());
//        $dancer->attributes()->create(json_decode($data['attributes'], true));

        return $dancer;
    }
}