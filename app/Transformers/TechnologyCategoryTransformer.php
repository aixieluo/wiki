<?php

namespace App\Transformers;

use App\Models\TechnologyCategory;
use League\Fractal\TransformerAbstract;

class TechnologyCategoryTransformer extends TransformerAbstract
{
    public function transform(TechnologyCategory $technologyCategory) {
        return [
            'id'         => $technologyCategory->id,
            'name'       => $technologyCategory->name,
            'created_at' => $technologyCategory->created_at->diffForHumans(),
            'updated_at' => $technologyCategory->updated_at->diffForHumans()
        ];
    }
}