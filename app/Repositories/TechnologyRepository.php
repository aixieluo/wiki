<?php

namespace App\Repositories;

use App\Models\Technology;

class TechnologyRepository
{
    use BaseRepository;

    protected $model;

    public function __construct(Technology $technology) {
        $this->model = $technology;
    }

    public function store($data) {
        $this->model = $this->model->create($data);
        $this->createAttributes($data);
    }

    public function update($id, $data) {
        $this->model = $this->getById($id);
        $this->model->update($data);
        $this->updateAttributes($data);
    }

    public function destroy($id) {
        $this->model = $this->getById($id);
        if ($this->model->dancers()->count()) {
            $this->model->dancers()->detach();
        }
        $this->model->delete();
        $this->deleteAttributes();
    }
}