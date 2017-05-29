<?php

namespace App\Transformers;

use App\Models\Technology;
use League\Fractal\TransformerAbstract;

class TechnologyTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'technologyType',
        'attributes'
    ];

    public function transform(Technology $technology) {
        return [
            'id'                 => $technology->id,
            'technology_type_id' => $technology->technology_type_id,
            'name'               => $technology->name,
            'rank'               => $technology->rank,
            'row'                => $technology->row,
            'column'             => $technology->column,
            'place'              => $technology->place,
            'created_at'         => $technology->created_at->diffForHumans(),
            'updated_at'         => $technology->updated_at->diffForHumans()
        ];
    }

    public function includeTechnologyType(Technology $technology) {
        $technologyType = $technology->technologyType;

        return $this->collection($technologyType, new TechnologyTypeTransformer);
    }

    public function includeAttributes(Technology $technology) {
        $attributes = $technology->attributes()->first();

        return $this->item($attributes, new AttributeTransformer);
    }
}