<?php

namespace App\Transformers;

use App\Models\Country;
use App\Models\Dancer;
use App\Models\Rarity;
use App\Models\Slot;
use App\Models\Technology;
use App\Models\Type;
use League\Fractal\TransformerAbstract;

class DancerTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'types',
        'countries',
        'rarities',
        'attributes',
        'technologies',
        'technologyCollection',
        'slots',
        'slotCollection'
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
    public function includeRarities(Dancer $dancer) {
        $rarities = Rarity::all();

        return $this->collection($rarities, new RarityTransformer);
    }

    public function includeAttributes(Dancer $dancer) {
        $attributes = $dancer->attributes()->first();

        return $this->item($attributes, new AttributeTransformer);
    }

    public function includeTechnologies(Dancer $dancer) {
        $technologies = $dancer->technologies()->get();

        return $this->collection($technologies, new TechnologyTransformer);
    }

    public function includeTechnologyCollection(Dancer $dancer) {
        $technologyCollection = Technology::all();

        return $this->collection($technologyCollection, new TechnologyTransformer);
    }

    public function includeSlots(Dancer $dancer) {
        $slots = $dancer->slots()->withPivot('count')->get();

        return $this->collection($slots, new SlotTransformer);
    }

    public function includeSlotCollection(Dancer $dancer) {
        $slots = Slot::all();

        return $this->collection($slots, new SlotTransformer);
    }
}