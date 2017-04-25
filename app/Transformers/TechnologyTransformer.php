<?php

namespace App\Transformers;

use App\Models\Technology;
use League\Fractal\TransformerAbstract;

class TechnologyTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'technologyType'
    ];

    public function transform(Technology $technology) {
        return [
            'id' => $technology->id,
            'technology_category' => $technology->technologyType->technologyCategory->content,
            'technology_category_id' => $technology->technologyType->technology_category_id,
            'technology_type' => $technology->technologyType->content,
            'technology_type_id' => $technology->technology_type_id,
            'name' => $technology->name,
            'rank' => $technology->rank,
            'created_at' => $technology->created_at->diffForHumans()
        ];
    }

    public function includeTechnologyType(Technology $technology) {
        $technologyType = $technology->technologyType;

        return $this->collection($technologyType, new TechnologyTypeTransformer);
    }
}