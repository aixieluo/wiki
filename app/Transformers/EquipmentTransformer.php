<?php

namespace App\Transformers;

use App\Models\Equipment;
use League\Fractal\TransformerAbstract;

class EquipmentTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'equipmentInfo',
        'attributes'
    ];

    public function transform(Equipment $equipment) {
        return [
            'id'                => $equipment->id,
            'equipment_info_id' => $equipment->equipment_info_id,
            'lv'                => $equipment->lv,
            'price'             => $equipment->price,
            'created_at'        => $equipment->created_at->diffForHumans(),
            'updated_at'        => $equipment->updated_at->diffForHumans()
        ];
    }

    public function includeEquipmentInfo(Equipment $equipment) {
        $equipmentInfo = $equipment->equipmentInfo;

        return $this->collection($equipmentInfo, new EquipmentInfoTransformer);
    }

    public function includeAttributes(Equipment $equipment) {
        $attributes = $equipment->attributes()->first();

        return $this->item($attributes, new AttributeTransformer);
    }
}