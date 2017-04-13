<?php

namespace App\Repositories;

use App\Models\Type;

class TypeRepository {
    use BaseRepository;

    protected $model;

    public function __construct(Type $type) {
        $this->model = $type;
    }

    public function page($number = 10, $sort = 'desc', $sortColumn = 'id') {
        return $this->model->orderBy($sortColumn, $sort)->paginate($number);
    }

    public function getById($id) {
        return $this->model->findorfail($id);
    }

    public function destroy($id) {
        return $this->getById($id)->delete();
    }
}