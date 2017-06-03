<?php

namespace App\Transformers;

use App\Models\Country;
use App\Models\Dancer;
use App\Models\Rarity;
use App\Models\Type;
use League\Fractal\TransformerAbstract;

class DancerTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'types',
        'countries',
        'rarities',
        'attributes'
    ];

    public function transform(Dancer $dancer) {
        return [
            'id'             => $dancer->id,
            'name'           => $dancer->name,
            'dance_outfit'   => $dancer->dance_outfit,
            'type_id'        => $dancer->type_id,
            'country_id'     => $dancer->country_id,
            'rarity_id'      => $dancer->rarity_id,
            'subjection'     => $dancer->subjection,
            'introduction'   => $dancer->introduction,
            'character'      => $dancer->character,
            'grow_fire'      => $dancer->grow_fire,
            'grow_penetrate' => $dancer->grow_penetrate,
            'grow_durable'   => $dancer->grow_durable,
            'grow_armor'     => $dancer->grow_armor,
            'created_at'     => $dancer->created_at->diffForHumans(),
            'updated_at'     => $dancer->updated_at->diffForHumans()
        ];
    }

    /**
     * Include Type
     *
     * @param Dancer $dancer
     *
     * @return \League\Fractal\Resource\Collection
     */
    public function includeTypes(Dancer $dancer) {
        $types = Type::all();

        return $this->collection($types, new TypeTransformer);
    }

    /**
     * Include Country
     *
     * @param Dancer $dancer
     *
     * @return \League\Fractal\Resource\Collection
     */
    public function includeCountries(Dancer $dancer) {
        $countries = Country::all();

        return $this->collection($countries, new CountryTransformer);
    }

    /**
     * Include Rarity
     *
     * @param Dancer $dancer
     *
     * @return \League\Fractal\Resource\Collection
     */
    public function includeRarity(Dancer $dancer) {
        $rarities = Rarity::all();

        return $this->collection($rarities, new RarityTransformer);
    }

    public function includeAttributes(Dancer $dancer) {
        $attributes = $dancer->attributes;

        return $this->collection($attributes, new AttributeTransformer);
    }
}