<?php

namespace App\Repositories;

use App\Models\EquipmentInfo;

class EquipmentInfoRepository
{
    use BaseRepository;

    protected $model;

    public function __construct(EquipmentInfo $equipmentInfo) {
        $this->model = $equipmentInfo;
    }
}