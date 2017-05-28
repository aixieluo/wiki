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
        $data = $this->removeEmpty($data);
        $this->save($this->model, $data);
        $this->model->slots()->sync($this->transformSyncIds($data));
    }

    public function update($id, $data) {
        $data = $this->removeEmpty($data);
        $this->model = $this->getById($id);
        $this->save($this->model, $data);
        $this->model->slots()->sync($this->transformSyncIds($data));
    }

    public function destroy($id) {
        $this->model = $this->getById($id);
        $this->model->slots()->detach();
        $this->model->delete();
    }

    public function transformSyncIds($data) {
        $syncIds = [];
        foreach ($data['slots'] as $slot) {
            if ($slot['id'] == $data['main']['id']) {
                $syncIds[$slot['id']] = ['main' => 1];
            } else {
                $syncIds[$slot['id']] = ['main' => 0];
            }
        }
        return $syncIds;
    }
}