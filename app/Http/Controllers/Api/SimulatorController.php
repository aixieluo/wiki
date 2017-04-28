<?php

namespace App\Http\Controllers\Api;

use App\Repositories\SimulatorRepository;
use App\Transformers\SimulatorDancerTransformer;
use App\Transformers\SimulatorEquipmentTransformer;
use App\Transformers\SimulatorSkillTransformer;
use App\Transformers\SimulatorTacticTransformer;
use App\Transformers\SimulatorTechnologyTransformer;

class SimulatorController extends ApiController
{
    protected $simulator;

    public function __construct(SimulatorRepository $simulatorRepository) {
        parent::__construct();

        $this->simulator = $simulatorRepository;
    }

    public function getByDancerInfo($id) {
        return $this->respondWithItem($this->simulator->getByDancerInfo($id), new SimulatorDancerTransformer);
    }

    public function getByEquipment() {
        return $this->respondWithCollection($this->simulator->getByEquipment(), new SimulatorEquipmentTransformer);
    }

    public function getByTechnologies() {
        return $this->respondWithCollection($this->simulator->getByTechnologies(), new SimulatorTechnologyTransformer);
    }

    public function getByTactics() {
        return $this->respondWithCollection($this->simulator->getByTactics(), new SimulatorTacticTransformer);
    }

    public function getBySkills() {
        return $this->respondWithCollection($this->simulator->getBySkills(), new SimulatorSkillTransformer);
    }
}
