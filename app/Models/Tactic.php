<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tactic extends Model
{
    use SoftDeletes;

    protected $dates = ['delete_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tactic_info_id',
        'lv',
        'fire_up',
        'penetrate_up',
        'durable_up',
        'armor_up',
        'hit_up',
        'dodge_up',
        'concealment_up',
        'spy_up',
        'fire_down',
        'penetrate_down',
        'durable_down',
        'armor_down',
        'hit_down',
        'dodge_down',
        'concealment_down',
        'spy_down',
    ];

    public function tacticInfo() {
        return $this->belongsTo('App\Models\TacticInfo');
    }

    public function tacticNames() {
        return $this->where('lv', 1)->select('name')->get();
    }

    public function tacticAttributes($name, $lv) {
        return $this->where([
            'name' => $name,
            'lv' => $lv
        ])->select('describe', 'fire_up', 'penetrate_up', 'durable_up', 'armor_up', 'hit_up', 'dodge_up', 'concealment_up', 'spy_up', 'fire_down', 'penetrate_down', 'durable_down', 'armor_down', 'hit_down', 'dodge_down', 'concealment_down', 'spy_down')->first();
    }
}
