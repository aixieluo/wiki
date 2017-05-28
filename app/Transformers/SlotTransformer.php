<?php

namespace App\Transformers;


use App\Models\Slot;
use League\Fractal\TransformerAbstract;

class SlotTransformer extends TransformerAbstract
{
    public function transform(Slot $slot) {
        return [
            'id'         => $slot->id,
            'name'       => $slot->name,
            'created_at' => $slot->created_at->diffForHumans(),
            'updated_at' => $slot->updated_at->diffForHumans()
        ];
    }
}