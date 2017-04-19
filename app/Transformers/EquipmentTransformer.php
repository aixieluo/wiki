<?php

namespace App\Transformers;

use App\Models\Equipment;
use League\Fractal\TransformerAbstract;

class EquipmentTransformer extends TransformerAbstract
{
    public function transform(Equipment $equipment) {
        return [
            'id' => $equipment->id,
//            'name' => $equipment->name,
            'lv' => $equipment->lv,
            'main_slot' => $equipment->main_slot,
            'describe' => $equipment->describe,
            'price' => $equipment->price,
            'created_at' => $equipment->created_at->diffForHumans()
        ];
    }
}