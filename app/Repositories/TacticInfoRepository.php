<?php

namespace App\Repositories;

use App\Models\TacticInfo;

class TacticInfoRepository
{
    use BaseRepository;

    protected $model;

    public function __construct(TacticInfo $tacticInfo) {
        $this->model = $tacticInfo;
    }

    public function destroy($id) {
        $this->model = $this->getById($id);
        if ($this->model->tactics()->count()) {

            return $message = '该战术条目下存在详细信息条目，无法删除~';
        }
        $this->model->delete();
    }
}