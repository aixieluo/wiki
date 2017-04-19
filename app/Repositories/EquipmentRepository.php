<?php

namespace App\Repositories;

use App\Models\Equipment;

class EquipmentRepository
{
    use BaseRepository;

    protected $model;

    public function __construct(Equipment $equipment) {
        $this->model = $equipment;
    }
}