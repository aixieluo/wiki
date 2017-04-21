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
        $dancer = $this->getById($id);

        if (is_array($data['attributes'])) {
            $this->updateAttributes($dancer, $data['attributes']);
        } else {
            $this->updateAttributes($dancer, json_decode($data['attributes'], true));
        }

        $dancer->fill($data['dancer']);
        $dancer->save();

        return $dancer;
    }

    public function destroy($id) {
        $dancer = $this->getById($id);
        $dancer->delete();
        $this->deleteAttributes($dancer);

        return $dancer;
    }

    public function getByAttributes($id) {
        $dancer = $this->getById($id);

        return $dancer->attributes()->first();
    }

    public function createAttributes(Dancer $dancer, $attributes) {

        return $dancer->attributes()->create($attributes);
    }

    public function updateAttributes(Dancer $dancer, $attributes) {

        return $dancer->attributes()->update($attributes);
    }

    public function deleteAttributes(Dancer $dancer) {
        return $dancer->attributes()->delete();
    }
}