<?php

namespace App\Transformers;

use App\Models\Equipment;
use App\Models\EquipmentInfo;
use League\Fractal\TransformerAbstract;

class EquipmentTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'equipmentInfo',
        'slot'
    ];

    public function transform(Equipment $equipment) {
        return [
            'id' => $equipment->id,
            'name' => $equipment->equipmentInfo->name,
            'equipment_info_id' => $equipment->equipment_info_id,
            'describe' => $equipment->equipmentInfo->describe,
            'slot' => $equipment->slot->name,
            'slot_id' => $equipment->slot_id,
            'main' => $equipment->main,
            'lv' => $equipment->lv,
            'price' => $equipment->price,
            'created_at' => $equipment->created_at->diffForHumans()
        ];
    }

    public function includeEquipmentInfo(Equipment $equipment) {
        $equipmentInfo = $equipment->equipmentInfo;

        return $this->collection($equipmentInfo, new EquipmentInfo);
    }

    public function includeSlot(Equipment $equipment) {
        $slot = $equipment->slot;

        return $this->collection($slot, new SlotTransformer);
    }
}