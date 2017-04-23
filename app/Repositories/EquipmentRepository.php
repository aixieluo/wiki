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

    public function store($data) {
        $this->model = $this->model->create($data);

        if (is_array($data['attributes'])) {
            $this->createAttributes($data['attributes']);
        } else {
            $this->createAttributes(json_decode($data['attributes'], true));
        }

        return $this->model;
    }

    public function update($id, $data) {
        $this->model = $this->getById($id);

        if (is_array($data['attributes'])) {
            $this->updateAttributes($data['attributes']);
        } else {
            $this->updateAttributes(json_decode($data['attributes'], true));
        }

        return $this->model->update($data['equipment']);
    }

    public function destroy($id) {
        $this->model = $this->getById($id);
        $this->model->delete();
        $this->deleteAttributes();

        return $this->model;
    }
}