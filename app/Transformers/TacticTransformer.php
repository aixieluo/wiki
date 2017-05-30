<?php

namespace App\Transformers;

use App\Models\Tactic;
use League\Fractal\TransformerAbstract;

class TacticTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'tactic_info'
    ];

    public function transform(Tactic $tactic) {
        return [
            'id'               => $tactic->id,
            'tactic_info_id'   => $tactic->tactic_info_id,
            'lv'               => $tactic->lv,
            'fire_up'          => $tactic->fire_up,
            'penetrate_up'     => $tactic->penetrate_up,
            'durable_up'       => $tactic->durable_up,
            'armor_up'         => $tactic->armor_up,
            'hit_up'           => $tactic->hit_up,
            'dodge_up'         => $tactic->dodge_up,
            'concealment_up'   => $tactic->concealment_up,
            'spy_up'           => $tactic->spy_up,
            'fire_down'        => $tactic->fire_down,
            'penetrate_down'   => $tactic->penetrate_down,
            'durable_down'     => $tactic->durable_down,
            'armor_down'       => $tactic->armor_down,
            'hit_down'         => $tactic->hit_down,
            'dodge_down'       => $tactic->dodge_down,
            'concealment_down' => $tactic->concealment_down,
            'spy_down'         => $tactic->spy_down,
            'created_at'       => $tactic->created_at->diffForHumans(),
            'updated_at'       => $tactic->updated_at->diffForHumans()
        ];
    }

    public function includeTacticInfo(Tactic $tactic) {
        $tacticInfo = $tactic->tacticInfo;

        return $this->item($tacticInfo, new TacticInfoTransformer);
    }
}