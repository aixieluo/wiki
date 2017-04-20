<?php

namespace App\Transformers;

use App\Models\Equipment;
use App\Models\EquipmentInfo;
use League\Fractal\TransformerAbstract;

class EquipmentTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'equipmentInfo'
    ];

    public function transform(Equipment $equipment) {
        return [
            'id' => $equipment->id,
            'name' => $equipment->equipmentInfo->name,
            'describe' => $equipment->equipmentInfo->describe,
            'lv' => $equipment->lv,
            'price' => $equipment->price,
            'created_at' => $equipment->created_at->diffForHumans()
        ];
    }

    public function includeEquipmentInfo(Equipment $equipment) {
        $equipmentInfo = $equipment->equipmentInfo;

        return $this->collection($equipmentInfo, new EquipmentInfo);
    }
}