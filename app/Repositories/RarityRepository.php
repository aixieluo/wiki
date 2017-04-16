<?php

namespace App\Repositories;

use App\Models\Rarity;

class RarityRepository
{
    use BaseRepository;

    protected $model;

    public function __construct(Rarity $rarity) {
        $this->model = $rarity;
    }
}