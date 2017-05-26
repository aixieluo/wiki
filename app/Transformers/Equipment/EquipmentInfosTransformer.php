<?php

namespace App\Transformers\Equipment;

use App\Models\EquipmentInfo;
use League\Fractal\TransformerAbstract;

class EquipmentInfosTransformer extends TransformerAbstract
{
    public function transform(EquipmentInfo $equipmentInfo) {
        return [
            'id' => $equipmentInfo->id,
            'name' => $equipmentInfo->name,
            'created_at' => $equipmentInfo->created_at->diffForHumans()
        ];
    }
}