<?php

namespace App\Repositories;

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

//        if (is_array($data['attributes'])) {
//            $this->syncAttributes($data['attributes']);
//        } else {
//            $this->syncAttributes(json_decode($data['attributes']));
//        }

        return $dancer;
    }

    public function syncAttributes($data) {
        $this->model->attributes()->sync($data);
    }
}