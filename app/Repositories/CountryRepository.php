<?php

namespace App\Repositories;

use App\Models\Country;

class CountryRepository
{
    use BaseRepository;

    protected $model;

    public function __construct(Country $country) {
        $this->model = $country;
    }
}