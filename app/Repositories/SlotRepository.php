<?php

namespace App\Repositories;


use App\Models\Slot;

class SlotRepository
{
    use BaseRepository;

    protected $model;

    public function __construct(Slot $slot) {
        $this->model = $slot;
    }

    public function store($data) {
        $this->model = $this->model->create($data);
    }

    public function update($id, $data) {
        $this->model = $this->getById($id);
        $this->model->update($data);
    }

    public function destroy($id) {
        return $message = '暂未开放装备槽删除功能~';
        $this->model = $this->getById($id);
        if ($this->model->technologyTypes()->count()) {

            return $message = '';
        }
        $this->model->delete();
    }
}