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

    public function destroy($id) {
        $this->model = $this->getById($id);
        if ($this->model->technologyTypes()->count()) {

            return $message = '该科技类别（一级）条目下存在科技类型（二级）条目，无法删除~';
        }
        $this->model->delete();
    }
}