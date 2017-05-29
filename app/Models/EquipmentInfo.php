<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EquipmentInfo extends Model
{
    use SoftDeletes;

    protected $dates = ['delete_at'];

    protected $fillable = ['name', 'describe'];

    public function equipment() {
        return $this->hasMany('App\Models\Equipment');
    }

    /**
     * 获取装备槽位
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function slots() {
        return $this->belongsToMany('App\Models\Slot')->withPivot('main');
    }
}
