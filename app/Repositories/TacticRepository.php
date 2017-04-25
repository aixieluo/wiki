<?php

namespace App\Repositories;

use App\Models\Tactic;

class TacticRepository
{
    use BaseRepository;

    protected $model;

    public function __construct(Tactic $tactic) {
        $this->model = $tactic;
    }
}