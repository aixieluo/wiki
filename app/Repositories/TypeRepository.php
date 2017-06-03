<?php

namespace App\Repositories;

use App\Models\Type;

class TypeRepository
{
    use BaseRepository;

    protected $model;

    public function __construct(Type $type) {
        $this->model = $type;
    }

    public function destroy($id) {
        $this->model = $this->getById($id);
        if ($this->model->dancers()->count()) {
            return $message = '该车种下存在关联钢舞姬,无法删除';
        }
        $this->model->delete();
    }
}