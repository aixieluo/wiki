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

    public function store($data) {
        $dancer = $this->model->create($data);

        if (is_array($data['attributes'])) {
            $this->createAttributes($dancer, $data['attributes']);
        } else {
            $this->createAttributes($dancer, json_decode($data['attributes'], true));
        }
//        $dancer->attributes()->create(json_decode($data['attributes'], true));

        return $dancer;
    }

    public function update($id, $data) {
        $dancer = $this->model->findOrFail($id);

        if (is_array($data['attributes'])) {
            $this->updateAttributes($dancer, $data['attributes']);
        } else {
            $this->updateAttributes($dancer, json_decode($data['attributes'], true));
        }

        $dancer->fill($data['dancer']);
        $dancer->save();
        return $dancer;
//        return $dancer->updata($data['dancer']);
    }

    public function getByAttributes($id) {
        $dancer = $this->model->findOrFail($id);

        return $dancer->attributes()->first();
    }

    public function createAttributes(Dancer $dancer, $attributes) {

        return $dancer->attributes()->create($attributes);
    }

    public function updateAttributes(Dancer $dancer, $attributes) {

        return $dancer->attributes()->update($attributes);
    }
}