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

    public function getByDanceOutfits() {
        return $this->model->select('id', 'name', 'dance_outfit')->get();
    }

    public function store($data) {
        $this->model = $this->model->create($data);

        if (is_array($data['attributes'])) {
            $this->createAttributes($data['attributes']);
        } else {
            $this->createAttributes(json_decode($data['attributes'], true));
        }

        return $this->model;
    }

    public function update($id, $data) {
        $this->model = $this->getById($id);

        if (is_array($data['attributes'])) {
            $this->updateAttributes($data['attributes']);
        } else {
            $this->updateAttributes(json_decode($data['attributes'], true));
        }

        return $this->model->update($data['dancer']);
    }

    public function destroy($id) {
        $this->model = $this->getById($id);
        $this->model->delete();

        return $this->deleteAttributes();
    }

    public function getByTechnologies($id) {
        return $this->getById($id)->technologies()->get();
    }

    public function syncTechnologies($id, $syncIds) {
        return $this->getById($id)->technologies()->sync($syncIds);
    }
}