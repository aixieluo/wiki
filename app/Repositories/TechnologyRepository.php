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
        if ($this->model->where('name', $data['name'])->count()) {
            return $message = '该科技名称已存在';
        }
        $this->model = $this->model->create($data);
        $this->createAttributes($data);
    }

    public function update($id, $data) {
        if ($this->model->where('name', $data['name'])->count() && $this->getById($id)->name != $data['name']) {
            return $message = '该科技名称已存在';
        }
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