<?php

namespace App\Repositories;


use App\Models\Slot;

class SlotRepository
{
    use BaseRepository;

    protected $model;

    public function __construct(Slot $slot) {
        $this->model = $slot;
    }
}