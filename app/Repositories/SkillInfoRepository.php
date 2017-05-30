<?php

namespace App\Repositories;

use App\Models\SkillInfo;

class SkillInfoRepository
{
    use BaseRepository;

    protected $model;

    public function __construct(SkillInfo $skillInfo) {
        $this->model = $skillInfo;
    }

    public function destroy($id) {
        $this->model = $this->getById($id);
        if ($this->model->skills()->count()) {

            return $message = '该辎械条目下存在详细信息条目，无法删除~';
        }
        $this->model->delete();
    }
}