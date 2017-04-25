<?php

namespace App\Transformers;

use App\Models\TechnologyCategory;
use League\Fractal\TransformerAbstract;

class TechnologyCategoryTransformer extends TransformerAbstract
{
    public function transform(TechnologyCategory $technologyCategory) {
        return [
            'id' => $technologyCategory->id,
            'content' => $technologyCategory->content,
            'created_at' => $technologyCategory->created_at->diffForHumans()
        ];
    }
}