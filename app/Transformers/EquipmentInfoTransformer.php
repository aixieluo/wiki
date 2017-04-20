<?php

namespace App\Transformers;

use App\Models\EquipmentInfo;
use League\Fractal\TransformerAbstract;

class EquipmentInfoTransformer extends TransformerAbstract
{
    public function transform(EquipmentInfo $equipmentInfo) {
        return [
            'id' => $equipmentInfo->id,
            'name' => $equipmentInfo->name,
            'describe' => $equipmentInfo->describe,
            'created_at' => $equipmentInfo->created_at->diffForHumans()
        ];
    }
}