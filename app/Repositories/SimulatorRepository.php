<?php

namespace App\Repositories;

use App\Models\Dancer;
use App\Models\Equipment;
use App\Models\Technology;

class SimulatorRepository
{
    use BaseRepository;

    protected $dancer;
    protected $equipment;
    protected $technology;
    protected $model;

    public function __construct(Dancer $dancer, Equipment $equipment, Technology $technology) {
        $this->dancer = $dancer;
        $this->equipment =$equipment;
        $this->technology = $technology;
    }

    public function getByDancerInfo($id) {
        $this->model = $this->dancer;

        return $this->getById($id);
    }
}