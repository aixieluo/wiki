<?php

namespace App\Repositories;

use App\Models\Rarity;

class RarityRepository
{
    use BaseRepository;

    protected $model;

    public function __construct(Rarity $rarity) {
        $this->model = $rarity;
    }

    public function destroy($id) {
        $this->model = $this->getById($id);
        if ($this->model->dancers()->count()) {
            return $message = '该分级下存在关联钢舞姬,无法删除';
        }
        $this->model->delete();
    }
}