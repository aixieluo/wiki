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
    protected $fillable = ['lv', 'price'];

    /**
     * 获取装备槽位
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function slot() {
        return $this->belongsTo('App\Models\Slot');
    }

    public function equipmentInfo() {
        return $this->belongsTo('App\Models\EquipmentInfo');
    }

    /**
     * 获取基础属性
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function attributes() {
        return $this->morphMany('App\Models\Attribute', 'attributeable');
    }
}
