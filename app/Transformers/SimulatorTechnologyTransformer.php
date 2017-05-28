<?php

namespace App\Transformers;

use App\Models\Technology;
use League\Fractal\TransformerAbstract;

class SimulatorTechnologyTransformer extends TransformerAbstract
{
    public function transform(Technology $technology) {
        return [
            'id'                  => $technology->id,
            'name'                => $technology->name,
            'rank'                => $technology->rank,
            'technology_category' => $technology->technologyType->technologyCategory->content,
            'technology_type'     => $technology->technologyType->content,
            'attributes'          => [
                'fire'        => $technology->attributes->first()->fire,
                'penetrate'   => $technology->attributes->first()->penetrate,
                'durable'     => $technology->attributes->first()->durable,
                'armor'       => $technology->attributes->first()->armor,
                'hit'         => $technology->attributes->first()->hit,
                'dodge'       => $technology->attributes->first()->dodge,
                'concealment' => $technology->attributes->first()->concealment,
                'spy'         => $technology->attributes->first()->spy
            ]
        ];
    }
}