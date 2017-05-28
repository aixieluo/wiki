<?php

namespace App\Transformers;

use App\Models\TacticInfo;
use League\Fractal\TransformerAbstract;

class TacticInfoTransformer extends TransformerAbstract
{
    public function transform(TacticInfo $tacticInfo) {
        return [
            'id'         => $tacticInfo->id,
            'name'       => $tacticInfo->name,
            'describe'   => $tacticInfo->describe,
            'created_at' => $tacticInfo->created_at->diffForHumans()
        ];
    }
}