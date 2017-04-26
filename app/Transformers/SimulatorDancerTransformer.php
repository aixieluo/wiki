<?php

namespace App\Transformers;

use App\Models\Dancer;
use League\Fractal\TransformerAbstract;

class SimulatorDancerTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'type',
        'country',
        'rarity',
        'attributes'
    ];

    public function transform(Dancer $dancer) {
        return [
            'type' => $dancer->type->content,
            'country' => $dancer->country->content,
            'rarity' => $dancer->rarity->level,
            'grow_attributes' => [
                'grow_fire' => $dancer->grow_fire,
                'grow_penetrate' => $dancer->grow_penetrate,
                'grow_durable' => $dancer->grow_durable,
                'grow_armor' => $dancer->grow_armor,
            ],
            'equipment_number' => [
                'barbette' => $dancer->barbette,
                'refit' => $dancer->refit,
                'outside' => $dancer->outside,
                'inwall' => $dancer->inwall,
                'inwarehouse' => $dancer->inwarehouse,
                'carriage' => $dancer->carriage,
                'special' => $dancer->special,
            ],
            'attributes' => [
                'fire' => $dancer->attributes->first()->fire,
                'penetrate' => $dancer->attributes->first()->penetrate,
                'durable' => $dancer->attributes->first()->durable,
                'armor' => $dancer->attributes->first()->armor,
                'hit' => $dancer->attributes->first()->hit,
                'dodge' => $dancer->attributes->first()->dodge,
                'concealment' => $dancer->attributes->first()->concealment,
                'spy' => $dancer->attributes->first()->spy
            ],
        ];
    }

    public function includeType(Dancer $dancer) {
        $type = $dancer->type;

        return $this->collection($type, new TypeTransformer);
    }

    public function includeCountry(Dancer $dancer) {
        $country = $dancer->country;

        return $this->collection($country, new CountryTransformer);
    }

    public function includeRarity(Dancer $dancer) {
        $rarity = $dancer->rarity;

        return $this->collection($rarity, new RarityTransformer);
    }

    public function includeAttributes(Dancer $dancer) {
        $attributes = $dancer->attributes->first();

        return $this->collection($attributes, new AttributeTransformer);
    }
}