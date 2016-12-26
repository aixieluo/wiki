<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tactic extends Model
{
    /**
     * 拒绝自动填充的字段名单
     *
     * @var array
     */
    protected $guarded = [];

    public function tacticNames() {
        return $this->where('lv', 1)->select('name')->get();
    }
}
