<?php

namespace App\Transformers;

use App\Models\Skill;
use League\Fractal\TransformerAbstract;

class SkillTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'skillInfo'
    ];

    public function transform(Skill $skill) {
        return [
            'id' => $skill->id,
            'name' => $skill->skillInfo->name,
            'describe' => $skill->skillInfo->desccribe,
            'lv' => $skill->lv,
            'skill_info_id' => $skill->skill_info_id,
            'fire_up' => $skill->fire_up,
            'penetrate_up' => $skill->penetrate_up,
            'durable_up' => $skill->durable_up,
            'armor_up' => $skill->armor_up,
            'hit_up' => $skill->hit_up,
            'dodge_up' => $skill->dodge_up,
            'concealment_up' => $skill->concealment_up,
            'spy_up' => $skill->spy_up,
            'created_at' => $skill->created_at->diffForHumans()
        ];
    }

    public function includeSkillInfo(Skill $skill) {
        $skillInfo = $skill->skillInfo;

        return $this->collection($skillInfo, new SkillInfoTransformer);
    }
}