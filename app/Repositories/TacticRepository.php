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

    public function page($pId, $number = 10, $sort = 'desc', $sortColumn = 'id') {
        return $this->model->where('tactic_info_id', $pId)->orderBy($sortColumn, $sort)->paginate($number);
    }
}