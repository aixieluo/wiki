<?php

namespace App\Transformers;

use App\Models\Type;
use League\Fractal\TransformerAbstract;

class TypeTransformer extends TransformerAbstract
{
    public function transform(Type $type) {
        return [
            'id'         => $type->id,
            'name'    => $type->name,
            'created_at' => $type->created_at->diffForHumans(),
            'updated_at' => $type->updated_at->diffForHumans()
        ];
    }
}