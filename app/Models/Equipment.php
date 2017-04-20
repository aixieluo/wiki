<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Equipment extends Model
{
    use SoftDeletes;

    protected $dates = ['delete_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'lv', 'describe', 'price'];

    /**
     * 获取装备槽位
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function slots() {
        return $this->belongsToMany('App\Models\Slot')->withPivot('main');
    }

    /**
     * 获取基础属性
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function attributes(){
        return $this->morphMany('App\Models\Attribute','attributeable');
    }

    public function equipmentAttributes($name, $lv, $rank) {
        return $this->where('name', $name)
            ->where('lv', $lv)
            ->where('rank', $rank)
            ->first()
            ->attributes()
            ->select('fire', 'penetrate', 'durable', 'armor', 'hit', 'dodge', 'concealment', 'spy')
            ->first();
    }
}
