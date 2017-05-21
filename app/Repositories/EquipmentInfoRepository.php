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
        foreach ($data['activeSlots'] as $activeSlot) {
            if ($activeSlot['id'] == $data['main']['id']) {
                $syncIds[$activeSlot['id']] = ['main' => 1];
            } else {
                $syncIds[] = $activeSlot['id'];
            }
        }
        $this->model->slots()->sync($syncIds);
    }
}