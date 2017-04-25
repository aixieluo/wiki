<?php

namespace App\Repositories;

use App\Models\TechnologyCategory;

class TechnologyCategoryRepository
{
    use BaseRepository;

    protected $model;

    public function __construct(TechnologyCategory $technologyCategory) {
        $this->model = $technologyCategory;
    }
}