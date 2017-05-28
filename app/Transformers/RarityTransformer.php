<?php

namespace App\Transformers;

use App\Models\Rarity;
use League\Fractal\TransformerAbstract;

class RarityTransformer extends TransformerAbstract
{
    public function transform(Rarity $rarity) {
        return [
            'id'         => $rarity->id,
            'level'      => $rarity->level,
            'content'    => $rarity->content,
            'created_at' => $rarity->created_at->diffForHumans()
        ];
    }
}