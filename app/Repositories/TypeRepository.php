<?php

namespace App\Repositories;

use App\Models\Type;

class TypeRepository
{
    use BaseRepository;

    protected $model;

    public function __construct(Type $type) {
        $this->model = $type;
    }
}