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
        $data = $this->removeEmpty($data);
        $this->model = $this->model->create($data);
        $this->createAttributes($data);
    }

    public function update($id, $data) {
        $data = $this->removeEmpty($data);
        $this->model = $this->getById($id);
        $this->model->update($data);
        $this->updateAttributes($data);
    }

    public function destroy($id) {
        $this->model = $this->getById($id);
        $this->model->delete();
        $this->deleteAttributes();
        $this->model->technologies()->detach();
    }

    public function getByTechnologies($id) {
        return $this->getById($id)->technologies()->get();
    }

    public function syncTechnologies($id, $syncIds) {
        $this->getById($id)->technologies()->sync($syncIds);
    }

    public function syncSlots($id, $slots) {
        dd($slots);
    }
}