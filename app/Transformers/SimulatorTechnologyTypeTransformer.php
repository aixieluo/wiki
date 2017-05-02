<?php

namespace App\Transformers;

use App\Models\TechnologyType;
use League\Fractal\TransformerAbstract;

class SimulatorTechnologyTypeTransformer extends TransformerAbstract
{
    public function transform(TechnologyType $technologyType) {
        return [
            'content' => $technologyType->content,
            'amount1' => $technologyType->amount1,
            'amount2' => $technologyType->amount2,
            'amount3' => $technologyType->amount3,
        ];
    }
}