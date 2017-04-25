<?php

namespace App\Repositories;

use App\Models\Technology;

class TechnologyRepository
{
    use BaseRepository;

    protected $model;

    public function __construct(Technology $technology) {
        $this->model = $technology;
    }
}