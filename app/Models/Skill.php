<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Skill extends Model
{
    use SoftDeletes;

    protected $dates = ['delete_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'skill_info_id',
        'lv',
        'fire_up',
        'penetrate_up',
        'durable_up',
        'armor_up',
        'hit_up',
        'dodge_up',
        'concealment_up',
        'spy_up',
    ];

    public function skillInfo() {
        return $this->belongsTo('App\Models\SkillInfo');
    }

    public function skillNames() {
        return $this->where('lv', 1)->select('name')->get();
    }

    public function skillAttributes($name, $lv) {
        return $this->where([
            'name' => $name,
            'lv'   => $lv
        ])->select('describe', 'fire_up', 'penetrate_up', 'durable_up', 'armor_up', 'hit_up', 'dodge_up', 'concealment_up', 'spy_up')->first();
    }
}
