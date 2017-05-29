<?php

namespace App\Transformers;

use App\Models\TechnologyType;
use League\Fractal\TransformerAbstract;

class TechnologyTypeTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'technologyCategory'
    ];

    public function transform(TechnologyType $technologyType) {
        return [
            'id'                     => $technologyType->id,
            'technology_category_id' => $technologyType->technology_category_id,
            'name'                   => $technologyType->name,
            'amount1'                => $technologyType->amount1,
            'amount2'                => $technologyType->amount2,
            'amount3'                => $technologyType->amount3,
            'created_at'             => $technologyType->created_at->diffForHumans(),
            'updated_at'             => $technologyType->updated_at->diffForHumans()
        ];
    }

    public function includeTechnologyCategory(TechnologyType $technologyType) {
        $technologyCategory = $technologyType->technologyCategory;

        return $this->collection($technologyCategory, new TechnologyCategoryTransformer);
    }
}