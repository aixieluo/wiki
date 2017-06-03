<?php

namespace App\Transformers;

use App\Models\Rarity;
use League\Fractal\TransformerAbstract;

class RarityTransformer extends TransformerAbstract
{
    public function transform(Rarity $rarity) {
        return [
            'id'         => $rarity->id,
            'lv'      => $rarity->lv,
            'name'    => $rarity->name,
            'created_at' => $rarity->created_at->diffForHumans(),
            'updated_at' => $rarity->updated_at->diffForHumans()
        ];
    }
}