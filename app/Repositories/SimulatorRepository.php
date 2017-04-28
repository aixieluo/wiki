<?php

namespace App\Repositories;

use App\Models\Dancer;
use App\Models\Equipment;
use App\Models\Skill;
use App\Models\Tactic;
use App\Models\Technology;

class SimulatorRepository
{
    use BaseRepository;

    protected $dancer;
    protected $equipment;
    protected $technology;
    protected $tactic;
    protected $skill;
    protected $model;

    public function __construct(Dancer $dancer, Equipment $equipment, Technology $technology, Tactic $tactic, Skill $skill) {
        $this->dancer = $dancer;
        $this->equipment =$equipment;
        $this->technology = $technology;
        $this->tactic = $tactic;
        $this->skill = $skill;
    }

    public function getByDancerInfo($id) {
        $this->model = $this->dancer;

        return $this->getById($id);
    }

    public function getByEquipment() {
        return $this->all($this->equipment);
    }

    public function getByTechnologies() {
        return $this->all($this->technology);
    }

    public function getByTactics() {
        return $this->all($this->tactic);
    }

    public function getBySkills() {
        return $this->all($this->skill);
    }
}