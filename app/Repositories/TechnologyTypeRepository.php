<?php

namespace App\Repositories;

use App\Models\TechnologyType;

class TechnologyTypeRepository
{
    use BaseRepository;

    protected $model;

    public function __construct(TechnologyType $technologyType) {
        $this->model = $technologyType;
    }

    public function page($gid, $number = 10, $sort = 'desc', $sortColumn = 'id') {

        return $this->model->where('technology_category_id', $gid)->orderBy($sortColumn, $sort)->paginate($number);
    }

    public function store($data) {
        if ($this->model->where('name', $data['name'])->count()) {
            return $message = '该科技类型（二级）名称已存在';
        }
        $this->model = $this->model->create($data);
    }

    public function update($id, $data) {
        if ($this->model->where('name', $data['name'])->count() && $this->getById($id)->name != $data['name']) {
            return $message = '该科技类型（二级）名称已存在';
        }
        $this->model = $this->getById($id);
        $this->model->update($data);
    }

    public function destroy($id) {
        $this->model = $this->getById($id);
        if ($this->model->technologies()->count()) {

            return $message = '该科技类型（二级）条目下存在科技条目，无法删除~';
        }
        $this->model->delete();
    }
}