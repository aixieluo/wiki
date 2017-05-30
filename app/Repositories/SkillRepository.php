<?php

namespace App\Repositories;

use App\Models\Skill;

class SkillRepository
{
    use BaseRepository;

    protected $model;

    public function __construct(Skill $skill) {
        $this->model = $skill;
    }

    public function page($pId, $number = 10, $sort = 'desc', $sortColumn = 'id') {

        return $this->model->where('skill_info_id', $pId)->orderBy($sortColumn, $sort)->paginate($number);
    }
}