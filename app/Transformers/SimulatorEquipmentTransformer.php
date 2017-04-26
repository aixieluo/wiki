<?php

namespace App\Transformers;

use App\Models\Equipment;
use League\Fractal\TransformerAbstract;

class SimulatorEquipmentTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'equipmentInfo',
        'slot',
        'attributes'
    ];

    public function transform(Equipment $equipment) {
        return [
            'name' => $equipment->equipmentInfo->name,
            'lv' => $equipment->lv,
            'slot' => $equipment->slot->name,
            'attributes' => [
                'fire' => $equipment->attributes->first()->fire,
                'penetrate' => $equipment->attributes->first()->penetrate,
                'durable' => $equipment->attributes->first()->durable,
                'armor' => $equipment->attributes->first()->armor,
                'hit' => $equipment->attributes->first()->hit,
                'dodge' => $equipment->attributes->first()->dodge,
                'concealment' => $equipment->attributes->first()->concealment,
                'spy' => $equipment->attributes->first()->spy
            ],
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

    public function includeAttributes(Equipment $equipment) {
        $attributes = $equipment->attributes->first();

        return $this->collection($attributes, new AttributeTransformer);
    }
}