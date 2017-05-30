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

    public function page($gId, $number = 10, $sort = 'desc', $sortColumn = 'id') {

        return $this->model->where('technology_category_id', $gId)->orderBy($sortColumn, $sort)->paginate($number);
    }

    public function destroy($id) {
        $this->model = $this->getById($id);
        if ($this->model->technologies()->count()) {

            return $message = '该科技类型（二级）条目下存在科技条目，无法删除~';
        }
        $this->model->delete();
    }
}