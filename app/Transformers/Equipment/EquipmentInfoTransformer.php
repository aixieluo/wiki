<?php

namespace App\Transformers\Equipment;

use App\Models\EquipmentInfo;
use League\Fractal\TransformerAbstract;

class EquipmentInfoTransformer extends TransformerAbstract
{
    public function transform(EquipmentInfo $equipmentInfo) {
        return [
            'id' => $equipmentInfo->id,
            'name' => $equipmentInfo->name,
            'describe' => $equipmentInfo->describe,
            'slots' => $equipmentInfo->slots,
            'main' => $equipmentInfo->slots()->wherePivot('main', 1)->first(),
        ];
    }
}