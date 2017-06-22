<?php

namespace App\Repositories;

use App\Models\Technology;
use App\Models\TechnologyType;

class TechnologyRepository
{
    use BaseRepository;

    protected $model;
    protected $technology;

    public function __construct(Technology $technology) {
        $this->model = $technology;
        $this->technology = $technology;
    }

    public function page($pId, $number = 10, $sort = 'desc', $sortColumn = 'id') {

        return $this->model->where('technology_type_id', $pId)->orderBy($sortColumn, $sort)->paginate($number);
    }

    public function store($data) {
        $data = $this->removeEmpty($data);
        $this->model = $this->model->create($data);
        $this->createAttributes($data);
        $this->updateAmount();
    }

    public function update($id, $data) {
        $data = $this->removeEmpty($data);
        $this->model = $this->getById($id);
        $this->model->update($data);
        $this->updateAttributes($data);
    }

    public function destroy($id) {
        $this->model = $this->getById($id);
        if ($this->model->dancers()->count()) {
            $this->model->dancers()->detach();
        }
        $this->model->delete();
        $this->deleteAttributes();
        $this->updateAmount();
    }

    public function updateAmount() {
        $this->model->technologyType->amount1 = $this->model->where('rank', 1)->count();
        $this->model->technologyType->amount2 = $this->model->where('rank', 2)->count();
        $this->model->technologyType->amount3 = $this->model->where('rank', 3)->count();
        $this->model->technologyType->save();
    }
}