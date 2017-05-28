<?php

namespace App\Transformers;

use App\Models\SkillInfo;
use League\Fractal\TransformerAbstract;

class SkillInfoTransformer extends TransformerAbstract
{
    public function transform(SkillInfo $skillInfo) {
        return [
            'id'         => $skillInfo->id,
            'name'       => $skillInfo->name,
            'describe'   => $skillInfo->describe,
            'created_at' => $skillInfo->created_at->diffForHumans()
        ];
    }
}