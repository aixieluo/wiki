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
            'id' => $technologyType->id,
            'technology_category' => $technologyType->technologyCategory->content,
            'technology_category_id' => $technologyType->technology_category_id,
            'content' => $technologyType->content,
            'created_at' => $technologyType->created_at->diffForHumans()
        ];
    }

    public function includeTechnologyCategory(TechnologyType $technologyType) {
        $technologyCategory = $technologyType->technologyCategory;

        return $this->collection($technologyCategory, new TechnologyCategoryTransformer);
    }
}