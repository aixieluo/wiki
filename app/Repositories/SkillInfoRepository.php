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
}