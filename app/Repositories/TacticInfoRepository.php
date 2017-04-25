<?php

namespace App\Repositories;

use App\Models\TacticInfo;

class TacticInfoRepository
{
    use BaseRepository;

    protected $model;

    public function __construct(TacticInfo $tacticInfo) {
        $this->model = $tacticInfo;
    }
}