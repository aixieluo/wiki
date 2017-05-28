<?php

namespace App\Transformers;

use App\Models\EquipmentInfo;
use App\Models\Slot;
use League\Fractal\TransformerAbstract;

class EquipmentInfoTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'slots',
        'main',
        'allSlots'
    ];

    public function transform(EquipmentInfo $equipmentInfo) {
        return [
            'id'         => $equipmentInfo->id,
            'name'       => $equipmentInfo->name,
            'describe'   => $equipmentInfo->describe,
            'created_at' => $equipmentInfo->created_at->diffForHumans(),
            'updated_at' => $equipmentInfo->updated_at->diffForHumans()
        ];
    }

    public function includeSlots(EquipmentInfo $equipmentInfo) {
        $slots = $equipmentInfo->slots;

        return $this->collection($slots, new SlotTransformer);
    }

    public function includeMain(EquipmentInfo $equipmentInfo) {
        $main = $equipmentInfo->slots()->wherePivot('main', 1)->first();

        return $this->item($main, new SlotTransformer);
    }

    public function includeAllSlots(EquipmentInfo $equipmentInfo) {
        $allSlots = Slot::all();

        return $this->collection($allSlots, new SlotTransformer);
    }
}