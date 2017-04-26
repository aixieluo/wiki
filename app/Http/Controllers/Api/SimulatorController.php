<?php

namespace App\Http\Controllers\Api;

use App\Repositories\SimulatorRepository;
use App\Transformers\SimulatorDancerTransformer;

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
}
