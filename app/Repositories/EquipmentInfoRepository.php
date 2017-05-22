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

    public function store($data) {
        $this->model = $this->model->create($data);

        $syncIds = [];
        foreach ($data['slots'] as $slot) {
            if ($slot['id'] == $data['main']['id']) {
                $syncIds[$slot['id']] = ['main' => 1];
            } else {
                $syncIds[] = $slot['id'];
            }
        }
        $this->model->slots()->sync($syncIds);
    }
}