<?php

namespace App\Transformers;

use App\Models\TacticInfo;
use League\Fractal\TransformerAbstract;

class TacticInfoTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'tactics'
    ];

    public function transform(TacticInfo $tacticInfo) {
        return [
            'id'         => $tacticInfo->id,
            'name'       => $tacticInfo->name,
            'created_at' => $tacticInfo->created_at->diffForHumans(),
            'updated_at' => $tacticInfo->updated_at->diffForHumans()
        ];
    }

    public function includeTactics(TacticInfo $tacticInfo) {
        $tactics = $tacticInfo->tactics()->get();

        return $this->collection($tactics, new TacticTransformer);
    }
}