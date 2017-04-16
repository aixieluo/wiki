<?php

namespace App\Transformers;

use App\Models\Type;
use League\Fractal\TransformerAbstract;

class TypeTransformer extends TransformerAbstract
{
    public function transform(Type $type) {
        return [
            'id' => $type->id,
            'content' => $type->content,
            'created_at' => $type->created_at->diffForHumans()
        ];
    }
}