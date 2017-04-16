<?php

namespace App\Transformers;

use App\Models\Dancer;
use League\Fractal\TransformerAbstract;

class DancerTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'type',
        'country',
        'rarity'
    ];

    public function transform(Dancer $dancer) {
        return [
            'id' => $dancer->id,
            'name' => $dancer->name,
            'type' => $dancer->type->content,
        ];
    }
}