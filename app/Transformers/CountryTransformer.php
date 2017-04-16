<?php

namespace App\Transformers;

use App\Models\Country;
use League\Fractal\TransformerAbstract;

class CountryTransformer extends TransformerAbstract
{
    public function transform(Country $country) {
        return [
            'id' => $country->id,
            'content' => $country->content,
            'created_at' => $country->created_at->diffForHumans()
        ];
    }
}