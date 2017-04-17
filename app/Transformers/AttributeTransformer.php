<?php

namespace App\Transformers;

use App\Models\Attribute;
use League\Fractal\TransformerAbstract;

class AttributeTransformer extends TransformerAbstract
{
    public function transform(Attribute $attribute) {
        return [
            'fire' => $attribute->fire,
            'penetrate' => $attribute->penetrate,
            'durable' => $attribute->durable,
            'armor' => $attribute->armor,
            'hit' => $attribute->hit,
            'dodge' => $attribute->dodge,
            'concealment' => $attribute->concealment,
            'spy' => $attribute->spy
        ];
    }
}