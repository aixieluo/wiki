<?php

namespace App\Repositories;

use App\Models\Dancer;

class DancerRepository
{
    use BaseRepository;

    protected $model;

    public function __construct(Dancer $dancer) {
        $this->model = $dancer;
    }

    public function store($data) {
        $data = $this->removeEmpty($data);
        $slots = $this->transformSyncIds($data['slots']);
        $this->model = $this->model->create($data);
        $this->createAttributes($data);
        $this->syncSlots($slots);
    }

    public function update($id, $data) {
        $data = $this->removeEmpty($data);
        $slots = $this->transformSyncIds($data['slots']);
        $this->model = $this->getById($id);
        $this->model->update($data);
        $this->updateAttributes($data);
        $this->syncSlots($slots);
    }

    public function destroy($id) {
        $this->model = $this->getById($id);
        $this->model->delete();
        $this->deleteAttributes();
        $this->model->technologies()->detach();
        $this->model->slots()->detach();
    }

    public function getByTechnologies($id) {
        return $this->getById($id)->technologies()->get();
    }

    public function syncTechnologies($id, $syncIds) {
        $this->getById($id)->technologies()->sync($syncIds);
    }

    public function transformSyncIds($slots) {
        $slots =  array_filter($slots, function ($var) {
            return !empty($var['count']);
        });
        $ids = [];
        foreach ($slots as $slot) {
            $ids[$slot['id']] = ['count' => $slot['count']];
        }
        return $ids;
    }

    public function syncSlots($slots) {
        $this->model->slots()->sync($slots);
    }

    public function getByInfo($id) {
        $this->model = $this->getById($id);
        $info = $this->model->with(['type', 'country', 'rarity', 'slots', 'technologies'])->first();
        return $info;
    }
}