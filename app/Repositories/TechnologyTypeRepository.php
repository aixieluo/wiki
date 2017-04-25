<?php

namespace App\Repositories;

use App\Models\TechnologyType;

class TechnologyTypeRepository
{
    use BaseRepository;

    protected $model;

    public function __construct(TechnologyType $technologyType) {
        $this->model = $technologyType;
    }
}