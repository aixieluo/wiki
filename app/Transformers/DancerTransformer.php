<?php

namespace App\Transformers;

use App\Models\Dancer;
use League\Fractal\TransformerAbstract;

class DancerTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'type',
        'country',
        'rarity',
        'attributes'
    ];

    public function transform(Dancer $dancer) {
        return [
            'id' => $dancer->id,
            'name' => $dancer->name,
            'dance_outfit' => $dancer->dance_outfit,
            'type' => $dancer->type->content,
            'country' => $dancer->country->content,
            'rarity' => $dancer->rarity->content,
            'subjection' => $dancer->subjection,
            'introduction' => $dancer->introduction,
            'character' => $dancer->character,
            'grow_fire' => $dancer->grow_fire,
            'grow_penetrate' => $dancer->grow_penetrate,
            'grow_durable' => $dancer->grow_durable,
            'grow_armor' => $dancer->grow_armor,
            'barbette' => $dancer->barbette,
            'refit' => $dancer->refit,
            'outside' => $dancer->outside,
            'inwall' => $dancer->inwall,
            'inwarehouse' => $dancer->inwarehouse,
            'carriage' => $dancer->carriage,
            'special' => $dancer->special,
            'created_at' => $dancer->created_at->diffForHumans()
        ];
    }

    /**
     * Include Type
     *
     * @param Dancer $dancer
     *
     * @return \League\Fractal\Resource\Collection
     */
    public function includeType(Dancer $dancer) {
        $type = $dancer->type;

        return $this->collection($type, new TypeTransformer);
    }

    /**
     * Include Country
     *
     * @param Dancer $dancer
     *
     * @return \League\Fractal\Resource\Collection
     */
    public function includeCountry(Dancer $dancer) {
        $country = $dancer->country;

        return $this->collection($country, new CountryTransformer);
    }

    /**
     * Include Rarity
     *
     * @param Dancer $dancer
     *
     * @return \League\Fractal\Resource\Collection
     */
    public function includeRarity(Dancer $dancer) {
        $rarity = $dancer->rarity;

        return $this->collection($rarity, new RarityTransformer);
    }

    public function includeAttribute(Dancer $dancer) {
        $attributes = $dancer->attributes;

        return $this->collection($attributes, new AttributeTransformer);
    }
}