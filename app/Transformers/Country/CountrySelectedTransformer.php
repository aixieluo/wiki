<?php

namespace App\Transformers\Country;

use App\Models\Country;
use League\Fractal\TransformerAbstract;

class CountrySelectedTransformer extends TransformerAbstract
{
    public function transform(Country $country) {
        return [
            'name' => $country->name
        ];
    }
}