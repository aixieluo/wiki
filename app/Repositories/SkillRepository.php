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
}