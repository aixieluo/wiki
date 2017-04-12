<?php

namespace App\Repositories;

use App\Models\Type;

class TypeRepository {
    use BaseRepository;

    protected $model;

    public function __construct(Type $type) {
        $model = $type;
    }

    public function page($number = 10, $sort = 'asc', $sortColumn = 'created_at') {
        return $this->model->all();
    }

    public function getById($id) {
        return $this->model->findOrFail($id);
    }

    public function destroy($id) {
        return $this->getById($id)->delete();
    }
}