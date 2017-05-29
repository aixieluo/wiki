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

    public function page($pId, $number = 10, $sort = 'desc', $sortColumn = 'id') {

        return $this->model->where('equipment_info_id', $pId)->orderBy($sortColumn, $sort)->paginate($number);
    }

    public function store($data) {
        $this->model = $this->model->create($data);
        $this->createAttributes($data);
    }

    public function update($id, $data) {
        $this->model = $this->getById($id);
        $this->model->update($data);
        $this->updateAttributes($data);
    }

    public function destroy($id) {
        $this->model = $this->getById($id);
        $this->model->delete();
        $this->deleteAttributes();

        return $this->model;
    }
}