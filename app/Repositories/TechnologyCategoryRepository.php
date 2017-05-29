<?php

namespace App\Repositories;

use App\Models\TechnologyCategory;

class TechnologyCategoryRepository
{
    use BaseRepository;

    protected $model;

    public function __construct(TechnologyCategory $technologyCategory) {
        $this->model = $technologyCategory;
    }

    public function store($data) {
        if ($this->model->where('name', $data['name'])->count()) {
            return $message = '该科技类别（一级）名称已存在';
        }
        $this->model = $this->model->create($data);
    }

    public function update($id, $data) {
        if ($this->model->where('name', $data['name'])->count() && $this->getById($id)->name != $data['name']) {
            return $message = '该科技类别（一级）名称已存在';
        }
        $this->model = $this->getById($id);
        $this->model->update($data);
    }

    public function destroy($id) {
        $this->model = $this->getById($id);
        if ($this->model->technologyTypes()->count()) {

            return $message = '该科技类别（一级）条目下存在科技类型（二级）条目，无法删除~';
        }
        $this->model->delete();
    }
}